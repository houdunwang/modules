<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduTag;

/**
 * 按标签搜索
 * Class TagController
 * @package Modules\Edu\Http\Controllers\Front
 */
class TagController extends Controller
{
    public function show(EduTag $tag)
    {
        $lessons = $tag->lesson()->paginate(10);
        return view('edu::front.lesson.index', compact('lessons'));
    }
}
