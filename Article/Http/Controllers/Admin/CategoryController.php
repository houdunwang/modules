<?php

namespace Modules\Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function index(CategoryRepository $repository)
    {
        $categories = $repository->all();
        return view('article::admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('article::admin.category.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('article::show');
    }

    public function edit($id)
    {
        return view('article::edit');
    }

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
