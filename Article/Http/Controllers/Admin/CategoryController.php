<?php

namespace Modules\Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\ArticleCategory;
use Modules\Article\Http\Requests\CategoryRequest;
use Modules\Article\Repositories\CategoryRepository;
use Modules\Article\Repositories\ModelRepository;

class CategoryController extends Controller
{
    public function index(CategoryRepository $repository, ModelRepository $modelRepository)
    {
        if (!$modelRepository->count()) {
            return redirect(module_link('article.admin.model.index'))->with('error', '请先设置模型');
        }
        $categories = $repository->tree();
        return view('article::admin.category.index', compact('categories'));
    }

    public function create(CategoryRepository $repository, ModelRepository $modelRepository)
    {
        $categories = $repository->tree();
        $models = $modelRepository->all();
        return view('article::admin.category.create', compact('categories', 'models'));
    }

    public function store(CategoryRequest $request, CategoryRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('article.admin.category.index'))->with('success', '栏目添加成功');
    }

    public function show($id)
    {
        return view('article::show');
    }

    public function edit(ArticleCategory $category, CategoryRepository $repository, ModelRepository $modelRepository)
    {
        $categories = $repository->tree($category);
        $models = $modelRepository->all();
        return view('article::admin.category.edit', compact('category', 'categories','models'));
    }

    public function update(CategoryRequest $request, ArticleCategory $category)
    {
        $category->update($request->input());
        return redirect(module_link('article.admin.category.index'))->with('success', '栏目添加成功');
    }

    public function destroy(ArticleCategory $category, CategoryRepository $repository)
    {
        $repository->delete($category);
        return redirect(module_link('article.admin.category.index'))->with('success', '删除成功');
    }
}
