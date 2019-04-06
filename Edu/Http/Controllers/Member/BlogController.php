<?php

namespace Modules\Edu\Http\Controllers\Member;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduBlog;
use Modules\Edu\Http\Requests\BlogRequest;
use Modules\Edu\Repositories\BlogRepository;

/**
 * 视频播客
 * Class BlogController
 * @package Modules\Edu\Http\Controllers\Member
 */
class BlogController extends Controller
{
    use AuthorizesRequests;

    public function index(BlogRepository $repository)
    {
        $blogs = $repository->paginateByUser(auth()->user(), 10);
        return view('edu::member.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('edu::member.blog.create');
    }

    public function store(BlogRequest $request, BlogRepository $repository)
    {
        $repository->create($request->input());
        return module_redirect('edu.member.blog.index')->with('success', '播客添加成功');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('edu::show');
    }

    public function edit(EduBlog $blog)
    {
        return view('edu::member.blog.edit', compact('blog'));
    }

    public function update(BlogRequest $request, EduBlog $blog, BlogRepository $repository)
    {
        $this->authorize('update', $blog);
        $repository->update($blog, $request->input());
        return module_redirect('edu.member.blog.index')->with('success', '播客修改成功');
    }

    public function destroy(EduBlog $blog)
    {
        $this->authorize('delete', $blog);
        $blog->delete();
        return module_redirect('edu.member.blog.index')->with('success', '删除成功');
    }
}
