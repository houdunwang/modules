<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Services\OrderServer;

/**
 * 购买课程
 * Class LessonBuyController
 * @package Modules\Edu\Http\Controllers\Front
 */
class LessonBuyController extends Controller
{
    use AuthorizesRequests;

    public function make(EduLesson $lesson, OrderServer $orderServer)
    {
        $this->authorize('buy', $lesson);
        $orderServer->lesson($lesson);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('edu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('edu::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
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
