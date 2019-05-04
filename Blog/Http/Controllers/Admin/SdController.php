<?php
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogSd;
use Modules\Blog\Repositories\SdRepository;
use App\Servers\FieldServer;
class SdController extends Controller
{
    protected function getFieldServer()
    {
        return app(FieldServer::class)->init(module(), 'BlogSd');
    }

    public function index(SdRepository $repository)
    {
        $fieldServer = $this->getFieldServer();
        $data = $repository->paginate(10);
        return view('blog::admin.sd.index', compact('data','fieldServer'));
    }

    public function create(BlogSd $model)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.sd.create',compact('model','fieldServer'));
    }

    public function store(Request $request, SdRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('blog.admin.sd.index'))->with('success', '添加完成');
    }

    public function edit(BlogSd $sd)
    {
        $fieldServer = $this->getFieldServer();
        return view('blog::admin.sd.edit',
        ['model' => $sd, 'fieldServer' => $fieldServer]);
    }

    public function update(Request $request, BlogSd $sd, SdRepository $repository)
    {
        $repository->update($sd, $request->input());
        return redirect(module_link('blog.admin.sd.index'))->with('success', '修改成功');
    }

    public function destroy(BlogSd $sd,SdRepository $repository)
    {
        $repository->delete($sd);
        return redirect(module_link('blog.admin.sd.index'))->with('success', '删除成功');
    }
}
