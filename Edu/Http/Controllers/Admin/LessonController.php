<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Edu\Http\Requests\LessonRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Repositories\LessonRepository;

/**
 * 课程管理
 * Class LessonController
 * @package Modules\Edu\Http\Controllers\Admin
 */
class LessonController extends Controller
{
    use AuthorizesRequests;

    /**
     * 后台课程列表
     * @param LessonRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(LessonRepository $repository)
    {
        $lessons = $repository->paginate(15, ['*'], 'updated_at');
        return view('edu::admin.lesson.index', compact('lessons'));
    }

    /**
     * 新增课程
     * @param EduLesson $lesson
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(EduLesson $lesson)
    {
        return view('edu::admin.lesson.create', compact('lesson'));
    }

    /**
     * 保存课程
     * @param LessonRequest $request
     * @param LessonRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(LessonRequest $request, LessonRepository $repository)
    {
        $repository->create($request->input());
        return redirect(module_link('edu.admin.lesson.index'))->with('success', '课程添加成功');
    }

    /**
     * 编辑课程
     * @param EduLesson $lesson
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(EduLesson $lesson)
    {
        $this->authorize('update', $lesson);
        return view('edu::admin.lesson.edit', compact('lesson'));
    }

    /**
     * 更新课程
     * @param LessonRequest $request
     * @param EduLesson $lesson
     * @param LessonRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(LessonRequest $request, EduLesson $lesson, LessonRepository $repository)
    {
        $this->authorize('update', $lesson);
        $repository->update($lesson, $request->input());
        return redirect(module_link('edu.admin.lesson.index'))->with('success', '课程编辑成功');
    }

    /**
     * 删除课程
     * @param EduLesson $lesson
     * @param LessonRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(EduLesson $lesson, LessonRepository $repository)
    {
        $repository->delete($lesson);
        return redirect(module_link('edu.admin.lesson.index'))->with('success', '课程删除成功');
    }
}
