<?php

namespace Modules\Document\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Document\Entities\DocumentContent;
use Modules\Document\Repositories\ContentRepository;

class ContentController extends Controller
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

    public function show(DocumentContent $content, ContentRepository $repository)
    {
        $menus = $repository->tree($content->article);
        return view('document::front.content.show', compact('content', 'menus'));
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
