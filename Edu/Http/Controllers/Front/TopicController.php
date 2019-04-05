<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduTag;
use Modules\Edu\Entities\EduTopic;
use Modules\Edu\Http\Requests\EduTopicRequest;

/**
 * 话题管理
 * Class TopicController
 * @package Modules\Edu\Http\Controllers\Front
 */
class TopicController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $topics = EduTopic::site()->latest()->paginate(15);
        return view('edu::front.topic.index', compact('topics'));
    }

    public function search(Request $request)
    {
        $word = $request->query('query', request()->input('word'));
        $topics = EduTopic::searchByLike($word)->paginate(15);
        return view('edu::front.topic.index', compact('topics'));
    }

    public function create(EduTopic $topic)
    {
        $tags = EduTag::site()->get();
        return view('edu::front.topic.create', compact('tags', 'topic'));
    }

    public function store(EduTopicRequest $request)
    {
        $data = $request->input();
        $data['site_id'] = \site()['id'];
        $data['user_id'] = auth()->id();
        \DB::beginTransaction();
        $topic = EduTopic::create($data);
        $topic->tags()->sync($request->input('tags'));
        \DB::commit();
        return redirect(route('edu.front.topic.show', $topic))->with('success', '发表成功');
    }

    public function show(EduTopic $topic)
    {
        return view('edu::front.topic.show', compact('topic'));
    }

    public function edit(EduTopic $topic)
    {
        $this->authorize('update', $topic);
        $tags = EduTag::site()->get();
        return view('edu::front.topic.edit', compact('topic', 'tags'));
    }

    public function update(EduTopicRequest $request, EduTopic $topic)
    {
        $this->authorize('update', $topic);
        \DB::beginTransaction();
        $topic->update($request->input());
        $topic->tags()->detach();
        $topic->tags()->attach($request->input('tags'), ['site_id' => \site()['id']]);
        \DB::commit();
        return redirect(route('edu.front.topic.show', $topic))->with('success', '修改成功');
    }

    public function destroy(EduTopic $topic)
    {
        $this->authorize('destroy', $topic);
        \DB::beginTransaction();
        $topic->delete();
        $topic->tags()->detach();
        \DB::commit();
        return redirect(route('edu.front.topic.index'))->with('success', '删除成功');
    }

    public function recommend(EduTopic $topic)
    {
        $this->authorize('recommend', $topic);
        $topic['recommend'] = !$topic['recommend'];
        $topic->save();
        return back();
    }
}
