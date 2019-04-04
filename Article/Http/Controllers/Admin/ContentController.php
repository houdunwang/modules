<?php

namespace Modules\Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\ArticleContent;
use Modules\Article\Http\Requests\ContentRequest;
use Modules\Article\Repositories\CategoryRepository;
use Modules\Article\Repositories\ContentRepository;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ContentRepository $repository)
    {
        $contents = $repository->paginate(10);
        return view('article::admin.content.index', compact('contents'));
    }

    public function create(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->tree();
        return view('article::admin.content.create', compact('categories'));
    }

    public function store(ContentRequest $request, ContentRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('article.admin.content.index'))->with('success', '文章添加完成');
    }

    public function edit(ArticleContent $content, CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->tree();
        return view('article::admin.content.edit', compact('content', 'categories'));
    }

    public function update(ContentRequest $request, ArticleContent $content, ContentRepository $repository)
    {
        $repository->update($content, $request->input());
        return redirect(module_link('article.admin.content.index'))->with('success', '文章修改成功');
    }

    public function destroy(ArticleContent $content)
    {
        $content->delete();
        return redirect(module_link('article.admin.content.index'))->with('success', '删除成功');
    }
}
