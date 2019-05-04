<?php
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogCc;
use Modules\Blog\Repositories\CcRepository;
use App\Servers\FieldServer;
class CcController extends Controller
{
    protected function getFieldServer()
    {
        return app(FieldServer::class)->init(module(), 'BlogCc');
    }

    public function index(CcRepository $repository)
    {
        $fieldServer = $this->getFieldServer();
        $data = $repository->paginate(10);
        return view('blog::admin.cc.index', compact('data','fieldServer'));
    }

    public function create(BlogCc $model)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.cc.create',compact('model','fieldServer'));
    }

    public function store(Request $request, CcRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('blog.admin.cc.index'))->with('success', '添加完成');
    }

    public function edit(BlogCc $cc)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.cc.edit',
        ['model' => $cc, 'fieldServer' => $fieldServer]);
    }

    public function update(Request $request, BlogCc $cc, CcRepository $repository)
    {
        $repository->update($cc, $request->input());
        return redirect(module_link('blog.admin.cc.index'))->with('success', '修改成功');
    }

    public function destroy(BlogCc $cc,CcRepository $repository)
    {
        $repository->delete($cc);
        return redirect(module_link('blog.admin.cc.index'))->with('success', '删除成功');
    }
}
