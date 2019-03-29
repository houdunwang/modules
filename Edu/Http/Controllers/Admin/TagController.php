<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduTag;

/**
 * 标签管理
 * Class TagController
 * @package Modules\Edu\Http\Controllers\Admin
 */
class TagController extends Controller
{
    public function index()
    {
        $tags = EduTag::get();
        return view('edu::admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('edu::admin.tag.create');
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $data['site_id'] = \site()['id'];
        EduTag::create($data);
        return redirect(module_link('edu.admin.tag.index'))->with('success', '添加成功');
    }

    public function edit(EduTag $tag)
    {
        return view('edu::admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, EduTag $tag)
    {
        $tag->update($request->input());
        return redirect(module_link('edu.admin.tag.index'))->with('success', '标签修改成功');
    }

    public function destroy(EduTag $tag)
    {
        $tag->delete();
        return back()->with('success', '删除成功');
    }
}
