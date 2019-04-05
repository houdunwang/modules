<?php

namespace Modules\Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\ArticleField;
use Modules\Article\Entities\ArticleModel;
use Modules\Article\Repositories\FieldRepository;

class FieldController extends Controller
{

    public function index(ArticleModel $model, FieldRepository $repository)
    {
        $fields = $repository->all();
        return view('article::admin.field.index', compact('model', 'fields'));
    }

    public function create(ArticleModel $model)
    {
        return view('article::admin.field.create', compact('model'));
    }

    public function store(ArticleModel $model, Request $request, FieldRepository $repository)
    {
        $data = $request->input();
        $data['model_id'] = $model['id'];
        $data['field']['options'] = \GuzzleHttp\json_decode($data['field']['options'], true);
        $repository->create($data);
        return redirect(module_link('article.admin.field.index', $model))->with('success', '字段添加成功');
    }

    public function edit(ArticleModel $model, ArticleField $field)
    {
        return view('article::admin.field.edit', compact('model', 'field'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
