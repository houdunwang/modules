<?php

namespace Modules\Document\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Document\Entities\DocumentArticle;
use Modules\Document\Repositories\ContentRepository;

class ArticleController extends Controller
{
    public function index()
    {
        return view('document::index');
    }

    public function create()
    {
        return view('document::create');
    }

    public function store(Request $request)
    {
    }

    public function show(DocumentArticle $article, ContentRepository $repository)
    {
        $menus = $repository->tree($article);
        return view('document::front.article.show', compact('article', 'menus'));
    }

    public function edit($id)
    {
        return view('document::edit');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
