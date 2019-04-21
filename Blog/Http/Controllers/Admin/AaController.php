<?php
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogAa;
use Modules\Blog\Repositories\AaRepository;

class AaController extends Controller
{
    public function index(AaRepository $repository)
    {
        $data = $repository->paginate(10);
        return view('blog::admin.aa.index', compact('data'));
    }

    public function create()
    {
        return view('blog::admin.content.create');
    }

    public function store(Request $request, AaRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('article.admin.aa.index'))->with('success', '添加完成');
    }

    public function edit(BlogAa $aa)
    {
        return view('blog::admin.aa.edit', ['field'=>$aa]);
    }

    public function update(Request $request, BlogAa $aa, AaRepository $repository)
    {
        $repository->update($aa, $request->input());
        return redirect(module_link('blog.admin.aa.index'))->with('success', '修改成功');
    }

    public function destroy(BlogAa $aa)
    {
        $aa->delete();
        return redirect(module_link('blog.admin.aa.index'))->with('success', '删除成功');
    }
}
