<?php
namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduAd;
use Modules\Edu\Repositories\AdRepository;

class AdController extends Controller
{
    public function index(AdRepository $repository)
    {
        $data = $repository->paginate(10);
        return view('edu::admin.ad.index', compact('data'));
    }

    public function create()
    {
        return view('edu::admin.content.create');
    }

    public function store(Request $request, AdRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('article.admin.ad.index'))->with('success', '添加完成');
    }

    public function edit(EduAd $ad)
    {
        return view('edu::admin.ad.edit', ['field'=>$ad]);
    }

    public function update(Request $request, EduAd $ad, AdRepository $repository)
    {
        $repository->update($ad, $request->input());
        return redirect(module_link('edu.admin.ad.index'))->with('success', '修改成功');
    }

    public function destroy(EduAd $ad)
    {
        $ad->delete();
        return redirect(module_link('edu.admin.ad.index'))->with('success', '删除成功');
    }
}
