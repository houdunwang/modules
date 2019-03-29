<?php

namespace Modules\Document\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Document\Entities\DocumentArticle;
use Modules\Document\Entities\DocumentContent;
use Modules\Document\Repositories\ContentRepository;

class MenuController extends Controller
{
    public function index(Request $request, ContentRepository $repository)
    {
        $article = DocumentArticle::with('contents')->findOrFail($request->query('aid'));
        $menus = $repository->tree($article);
        return view('document::member.menu.index', compact('menus', 'article'));
    }

    public function create()
    {
        return view('document::create');
    }

    public function store(Request $request)
    {
        foreach ($request->input('menus') as $menu) {
            DocumentContent::find($menu['id'])->update($menu);
        }
        return \response()->json(['code' => 0, 'message' => '修改成功']);
    }

    public function show($id)
    {
        return view('document::show');
    }

    public function edit($id)
    {
        return view('document::edit');
    }

    public function update(Request $request, DocumentContent $content)
    {
        dd(3);
        $content->update($request->input());

        return back();
    }

    public function destroy($id)
    {
    }
}
