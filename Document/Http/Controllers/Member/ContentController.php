<?php

namespace Modules\Document\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Document\Entities\DocumentArticle;
use Modules\Document\Entities\DocumentContent;
use Modules\Document\Repositories\ContentRepository;

class ContentController extends Controller
{
    public function index(ContentRepository $contentRepository)
    {
        $article = DocumentArticle::findOrFail(\request()->query('aid'));
        $content = $article->contents()->first();
        if (!$content) {
            $content = $contentRepository->create(['title' => '介绍', 'article_id' => $article['id']]);
        }
        return redirect(module_link('document.member.content.edit', $content));
    }

    public function create()
    {
        return view('document::create');
    }

    public function store(Request $request)
    {
        $article = DocumentArticle::findOrFail($request->input('article_id'));
        $data = $request->input();
        $content = $article->contents()->create($data);
        return redirect(module_link('document.member.content.edit', $content));
    }

    public function show($id)
    {
        return view('document::show');
    }

    public function edit(DocumentContent $content, ContentRepository $repository)
    {
        $article = $content->article;
        $menus = $repository->tree($article);
        return view('document::member.content.edit', compact('content', 'article', 'menus'));
    }

    public function update(Request $request, DocumentContent $content)
    {
        $content['html'] = $request->input('editormd-html-code');
        $content['markdown'] = $request->input('editormd-markdown-doc');
        $content->save();
    }

    public function rename(Request $request, DocumentContent $content)
    {
        $content['title'] = $request->input('title') ?? $content['title'];
        $content->save();
        return back();
    }

    public function destroy(DocumentContent $content, ContentRepository $repository)
    {
        if ($repository->hasChildMenu($content)) {
            return \response()->json(['code' => 403, 'message' => '请先删除子菜单'], 403);
        }
        $content->delete();
        return redirect(module_link('document.member.content.index',
            ['aid' => $content['article_id']]))->with('success', '删除成功');
    }
}
