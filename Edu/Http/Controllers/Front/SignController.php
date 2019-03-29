<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Edu\Entities\EduSign;
use Modules\Edu\Repositories\EduSignRepository;
use Modules\Edu\Repositories\EduSignTotalRepository;

class SignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => "store"]);
    }

    public function index(EduSignRepository $repository, EduSignTotalRepository $eduSignTotalRepository)
    {
        $signs = $repository->paginate(50);
        $todaySign = $userSignInfo = null;
        if ($user = auth()->user()) {
            $todaySign = $repository->todaySign($user);
            $userSignInfo = $eduSignTotalRepository->userInfo($user);
        }
        return view('edu::front.sign.index', compact('signs', 'todaySign', 'userSignInfo'));
    }

    public function create()
    {

    }

    public function store(Request $request, EduSignRepository $repository)
    {
        $repository->create($request->all());
        return redirect(route('edu.front.sign.index'))->with('success', '签到成功，请继续保持每日签到');
    }

    public function show(EduSign $eduSign)
    {
    }

    public function edit(EduSign $eduSign)
    {
    }

    public function update(Request $request, EduSign $eduSign)
    {
    }

    public function destroy(EduSign $sign, EduSignRepository $repository)
    {
        $this->authorize('delete', $sign);
        $repository->delete($sign);
        return back()->with('success', '签到删除成功');
    }
}
