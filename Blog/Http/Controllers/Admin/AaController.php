<?php
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogAa;
use Modules\Blog\Repositories\AaRepository;
use App\Servers\FieldServer;
class AaController extends Controller
{
    protected function getFieldServer()
    {
        return app(FieldServer::class)->init(module(), 'BlogAa');
    }

    public function index(AaRepository $repository)
    {
        $fieldServer = $this->getFieldServer();
        $data = $repository->paginate(10);
        return view('blog::admin.aa.index', compact('data','fieldServer'));
    }

    public function create(BlogAa $model)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.aa.create',compact('model','fieldServer'));
    }

    public function store(Request $request, AaRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('blog.admin.aa.index'))->with('success', '添加完成');
    }

    public function edit(BlogAa $aa)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.aa.edit',
        ['model' => $aa, 'fieldServer' => $fieldServer]);
    }

    public function update(Request $request, BlogAa $aa, AaRepository $repository)
    {
        $repository->update($aa, $request->input());
        return redirect(module_link('blog.admin.aa.index'))->with('success', '修改成功');
    }

    public function destroy(BlogAa $aa,AaRepository $repository)
    {
        $repository->delete($aa);
        return redirect(module_link('blog.admin.aa.index'))->with('success', '删除成功');
    }
}
