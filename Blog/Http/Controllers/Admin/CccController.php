<?php
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogCcc;
use Modules\Blog\Repositories\CccRepository;
use App\Servers\FieldServer;
class CccController extends Controller
{
    protected function getFieldServer()
    {
        return app(FieldServer::class)->init(module(), 'BlogCcc');
    }

    public function index(CccRepository $repository)
    {
        $fieldServer = $this->getFieldServer();
        $data = $repository->paginate(10);
        return view('blog::admin.ccc.index', compact('data','fieldServer'));
    }

    public function create(BlogCcc $model)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.ccc.create',compact('model','fieldServer'));
    }

    public function store(Request $request, CccRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('blog.admin.ccc.index'))->with('success', '添加完成');
    }

    public function edit(BlogCcc $ccc)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.ccc.edit',
        ['model' => $ccc, 'fieldServer' => $fieldServer]);
    }

    public function update(Request $request, BlogCcc $ccc, CccRepository $repository)
    {
        $repository->update($ccc, $request->input());
        return redirect(module_link('blog.admin.ccc.index'))->with('success', '修改成功');
    }

    public function destroy(BlogCcc $ccc,CccRepository $repository)
    {
        $repository->delete($ccc);
        return redirect(module_link('blog.admin.ccc.index'))->with('success', '删除成功');
    }
}
