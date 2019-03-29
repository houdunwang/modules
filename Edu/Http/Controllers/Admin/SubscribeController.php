<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduSubscribe;
use Modules\Edu\Http\Requests\SubscribeRequest;

/**
 * 订阅管理
 * Class SubscribeController
 * @package Modules\Edu\Http\Controllers\Admin
 */
class SubscribeController extends Controller
{
    public function index()
    {
        $subscribes = EduSubscribe::get();
        return view('edu::admin.subscribe.index', compact('subscribes'));
    }

    public function create(EduSubscribe $subscribe)
    {
        return view('edu::admin.subscribe.create', compact('subscribe'));
    }

    public function store(SubscribeRequest $request)
    {
        $data = $request->input();
        $data['site_id'] = \site()['id'];
        EduSubscribe::create($data);
        return redirect(module_link('edu.admin.subscribe.index'))->with('success', '保存成功');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('edu::show');
    }

    /**
     * @param EduSubscribe $subscribe
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EduSubscribe $subscribe)
    {
        return view('edu::admin.subscribe.edit', compact('subscribe'));
    }

    /**
     * @param SubscribeRequest $request
     * @param EduSubscribe $subscribe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SubscribeRequest $request, EduSubscribe $subscribe)
    {
        $subscribe->update($request->input());
        return redirect(module_link('edu.admin.subscribe.index'))->with('success', '保存成功');
    }

    /**
     * @param EduSubscribe $subscribe
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(EduSubscribe $subscribe)
    {
        $subscribe->delete();
        return back();
    }
}
