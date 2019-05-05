<?php

namespace Modules\Edu\Http\Controllers\Admin;

use App\Servers\FieldServer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduSystem;
use Modules\Edu\Repositories\SystemRepository;

class SystemController extends Controller
{
    protected function getFieldServer()
    {
        return app(FieldServer::class)->init(module(), 'EduSystem');
    }

    public function index(SystemRepository $repository)
    {
        $fieldServer = $this->getFieldServer();
        $data = $repository->paginate(10);
        return view('edu::admin.system.index', compact('data', 'fieldServer'));
    }

    public function create(EduSystem $model)
    {
        $fieldServer = $this->getFieldServer();
        return view('edu::admin.system.create', compact('fieldServer', 'model'));
    }

    public function store(Request $request, SystemRepository $repository)
    {
        $model = $repository->create($request->input());
        $model->lesson()->sync(explode(',', $request->input('lessons')));
        return redirect(module_link('edu.admin.system.index'))->with('success', '添加完成');
    }

    public function edit(EduSystem $system)
    {
        $fieldServer = $this->getFieldServer();
        return view(
            'edu::admin.system.edit',
            ['model' => $system, 'fieldServer' => $fieldServer]
        );
    }

    public function update(Request $request, EduSystem $system, SystemRepository $repository)
    {
        $repository->update($system, $request->input());
        $system->lesson()->sync(explode(',', $request->input('lessons')));
        return redirect(module_link('edu.admin.system.index'))->with('success', '修改成功');
    }

    public function destroy(EduSystem $system, SystemRepository $repository)
    {
        $repository->delete($system);
        return redirect(module_link('edu.admin.system.index'))->with('success', '删除成功');
    }
}
