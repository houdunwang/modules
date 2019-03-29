<?php

namespace Modules\Edu\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Repositories\DurationRepository;

/**
 * 会员中心会员时长
 * Class DurationController
 * @package Modules\Edu\Http\Controllers\Member
 */
class DurationController extends Controller
{
    public function index(DurationRepository $repository)
    {
        $duration = $repository->getUserInfo(auth()->user());
        return view('edu::member.duration.index', compact('duration'));
    }
}
