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
            $content = preg_replace('/^@(.+)\s+/', '', $content);
            $comment = $model->comments()->create([
                'site_id' => \site()['id'],
                'module_id' => \module()['id'],
                'comment_content' => $content,
                'parent_id' => $request->input('parent_id', 0),
                'user_id' => auth()->id(),
            ]);
            $model->commentCreated();
            $userServer->notify($model->user, '你有新的评论', $comment->getLink());

            if($comment->parent_id){
                $userServer->notify($comment->reply->user, '你有新的回复', $comment->reply->getLink());
            }
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
