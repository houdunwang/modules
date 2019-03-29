<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LiveController extends Controller
{
    /**
     * 直播界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('edu::front.live.index');
    }

    /**
     * 更改直播状态
     * @param ConfigRepository $configRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\ResponseHttpException
     */
    public function create(ConfigRepository $configRepository)
    {
        $state = config_get('Edu.live_state') ? false : true;
        $configRepository->save(\module()['name'], ['live_state'=>$state]);
        return back();
    }
}
