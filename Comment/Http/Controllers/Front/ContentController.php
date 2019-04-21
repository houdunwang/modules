<?php

namespace Modules\Comment\Http\Controllers\Front;

use App\Notifications\UserNotification;
use App\Servers\UserServer;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Comment\Entities\Content;
use Modules\Comment\Http\Requests\ContentRequest;

class ContentController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 发表评论
     * @param ContentRequest $request
     * @param UserServer $userServer
     * @return array|\Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function store(ContentRequest $request, UserServer $userServer)
    {
        $key = 'comment_send_cache' . auth()->id();
        $time = now()->addSecond(config_get('Comment.timeout', 20));
        if (\Cache::add($key, $time, $time)) {
            $class = $request->input('comment_type');
            $model = (new $class)->find($request->input('comment_id'));
            $content = $request->input('comment_content');
            $comment = $model->comments()->create([
                'site_id' => \site()['id'],
                'module_id' => \module()['id'],
                'comment_content' => $userServer->replaceName($content),
                'parent_id' => $request->input('parent_id', 0),
                'user_id' => auth()->id(),
            ]);
            $model->commentCreated();
            //发送通知
            $users = $userServer->getUsersFromContent($content);
            array_push($users, $model->user->id);
            if ($comment->parent_id > 0) {
                array_push($users, $comment->reply->user->id);
            }
            $userServer->notifyToMany(
                User::whereIn('id', $users)->get(),
                '你有新的回复',
                $comment->getLink()
            );

            return [
                'message' => '评论发表成功',
                'code' => 0,
                'view' => view('comment::layouts._comment', compact('comment')) . '',
            ];
        }
        $diffSecond = now()->diffInSeconds(\Cache::get($key));
        return response()->json(['message' => "请{$diffSecond}秒后操作", 'code' => 40], 403);
    }

    public function show(Content $content)
    {
        return redirect($content->relation->getLink());
    }

    public function destroy(Content $content)
    {
        $content->delete();
        return back();
    }
}
