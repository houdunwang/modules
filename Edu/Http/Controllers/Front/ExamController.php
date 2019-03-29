<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduVideo;
use Modules\Edu\Repositories\ExamRepository;

class ExamController extends Controller
{
    public function store(Request $request, EduVideo $video, ExamRepository $repository)
    {
        $data = $request->input('questions', []);
        $grade = $repository->handle($video, $data, auth()->user());
        return view('edu::front.exam.store', compact('grade', 'video'));
    }

    /**
     * @param EduVideo $video
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(EduVideo $video)
    {
        return view('edu::front.exam.show', compact('video'));
    }
}
