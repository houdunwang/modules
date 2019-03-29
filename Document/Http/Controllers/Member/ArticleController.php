<?php

namespace Modules\Document\Http\Controllers\Member;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Document\Entities\DocumentArticle;
use Modules\Document\Repositories\ArticleRepository;

/**
 * 文档管理
 * Class ArticleController
 * @package Modules\Document\Http\Controllers\Member
 */
class ArticleController extends Controller
{
    use AuthorizesRequests;

    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->paginate(15);
        return view('document::member.article.index', compact('articles'));
    }

    public function create()
    {
        return view('document::member.article.create');
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $data['site_id'] = \site()['id'];
        $data['user_id'] = auth()->id();
        DocumentArticle::create($data);
        return redirect(module_link('document.member.article.index'))->with('success', '文档添加成功');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('document::show');
    }

    public function edit(DocumentArticle $article)
    {
        $this->authorize('update', $article);
        return view('document::member.article.edit', compact('article'));
    }

    public function update(Request $request, DocumentArticle $article)
    {
        $article->update($request->all());
        return redirect(module_link('document.member.article.index'))->with('success', '文档修改成功');
    }

    public function destroy(DocumentArticle $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return back()->with('success', '文档删除成功');
    }
}
