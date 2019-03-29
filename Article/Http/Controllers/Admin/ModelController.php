<?php

namespace Modules\Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\ArticleModel;
use Modules\Article\Http\Requests\ModelRequest;

class ModelController extends Controller
{
    public function index()
    {
        $models = ArticleModel::site()->get();
        return view('article::admin.model.index', compact('models'));
    }

    public function create()
    {
        return view('article::admin.model.create');
    }

    public function store(ModelRequest $request)
    {
        $data = $request->input();
        $data['site_id'] = \site()['id'];
        ArticleModel::create($data);
        return redirect(module_link('article.admin.model.index'))->with('success', '模型添加成功');
    }

    public function show(ArticleModel $model)
    {
        return view('article::show');
    }

    public function edit(ArticleModel $model)
    {
        return view('article::admin.model.edit', compact('model'));
    }

    public function update(Request $request, ArticleModel $model)
    {
        $model->update($request->input());
        return redirect(module_link('article.admin.model.index'))->with('success', '模型添加成功');
    }

    public function destroy($id)
    {
    }
}
