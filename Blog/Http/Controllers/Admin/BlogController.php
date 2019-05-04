<?php
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogBlog;
use Modules\Blog\Repositories\BlogRepository;
use App\Servers\FieldServer;
class BlogController extends Controller
{
    protected function getFieldServer()
    {
        return app(FieldServer::class)->init(module(), 'BlogBlog');
    }

    public function index(BlogRepository $repository)
    {
        $fieldServer = $this->getFieldServer();
        $data = $repository->paginate(10);
        return view('blog::admin.blog.index', compact('data','fieldServer'));
    }

    public function create(BlogBlog $model)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.blog.create',compact('model','fieldServer'));
    }

    public function store(Request $request, BlogRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('blog.admin.blog.index'))->with('success', '添加完成');
    }

    public function edit(BlogBlog $blog)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.blog.edit',
        ['model' => $blog, 'fieldServer' => $fieldServer]);
    }

    public function update(Request $request, BlogBlog $blog, BlogRepository $repository)
    {
        $repository->update($blog, $request->input());
        return redirect(module_link('blog.admin.blog.index'))->with('success', '修改成功');
    }

    public function destroy(BlogBlog $blog,BlogRepository $repository)
    {
        $repository->delete($blog);
        return redirect(module_link('blog.admin.blog.index'))->with('success', '删除成功');
    }
}
