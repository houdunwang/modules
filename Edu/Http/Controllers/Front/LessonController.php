<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduTag;
use Modules\Edu\Repositories\LessonRepository;
use Modules\Edu\Repositories\UserVideoRepository;
use Modules\Edu\Repositories\VideoRepository;

class LessonController extends Controller
{
    /**
     * 课程列表
     * @param LessonRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(LessonRepository $repository)
    {
        $lessons = EduLesson::latest('is_commend')->latest('updated_at')->paginate(12);
        return view('edu::front.lesson.index', compact('lessons'));
    }

    /**
     * 按标签搜索
     * @param EduTag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag(EduTag $tag)
    {
        $lessons = $tag->lesson()->latest('is_commend')->latest('updated_at')->paginate(10);
        return view('edu::front.lesson.index', compact('lessons'));
    }

    /**
     * 课程列表
     * @param EduLesson $lesson
     * @param VideoRepository $videoRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(EduLesson $lesson, VideoRepository $videoRepository)
    {
        $videos = $videoRepository->getALlByLesson($lesson);
        return view('edu::front.lesson.show', compact('lesson', 'videos'));
    }
}
