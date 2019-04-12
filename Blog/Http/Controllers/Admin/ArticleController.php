<?php

namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogArticle;
use Modules\Blog\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    public function index(ArticleRepository $repository)
    {
        $data = $repository->paginate(10);
        return view('blog::admin.article.index', compact('data'));
    }

    public function create(BlogArticle $article)
    {
        return view('blog::admin.article.create', ['field' => $article]);
    }

    public function store(Request $request, ArticleRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('blog.admin.article.index'))->with('success', '添加完成');
    }

    public function edit(BlogArticle $article)
    {
        return view('blog::admin.article.edit', ['field' => $article]);
    }

    public function update(Request $request, BlogArticle $article, ArticleRepository $repository)
    {
        $repository->update($article, $request->input());
        return redirect(module_link('blog.admin.article.index'))->with('success', '修改成功');
    }

    public function destroy(BlogArticle $article)
    {
        $article->delete();
        return redirect(module_link('blog.admin.article.index'))->with('success', '删除成功');
    }
}
