<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Repositories;

use App\Repositories\Repository;
use App\User;
use Illuminate\Support\Collection;
use Modules\Edu\Entities\EduExam;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduVideo;

/**
 * 考试
 * Class ExamRepository
 * @package Modules\Edu\Repositories
 */
class ExamRepository extends Repository
{
    protected $model = EduExam::class;

    /**
     * 判卷
     * @param EduVideo $video
     * @param array $answer
     * @param User $user
     * @return array
     * @throws \Exception
     */
    public function handle(EduVideo $video, array $answer, User $user)
    {
        $results = ['answer' => [], 'grade' => 0];
        foreach ($video['question'] as $i => $question) {
            $rights = $this->getRight($question);
            $results['answer'][$i] = isset($answer[$i]) && $rights == $answer[$i] ? true : false;
        }
        $results['grade'] = round(
            count(array_filter($results['answer']))
            / count($video['question']) * 100
        );
        EduExam::updateOrCreate([
            'site_id' => \site()['id'],
            'user_id' => auth()->id(),
            'video_id' => $video['id'],
            'lesson_id' => $video['lesson_id'],
        ], $results);
        cache()->forget($this->cacheKey($video->lesson, $user));
        return $results;
    }

    /**
     * 获取题目的正确答案
     * @param $question
     * @return array
     */
    protected function getRight($question)
    {
        $rights = [];
        foreach ($question['topics'] as $key => $topic) {
            if ($topic['right']) {
                $rights[] = $key;
            }
        }
        return $rights;
    }

    /**
     * 缓存键名
     * @param EduLesson $lesson
     * @param User $user
     * @return string
     */
    protected function cacheKey(EduLesson $lesson, User $user)
    {
        return sprintf('%s%s%s%s',
            'edu_user_exam',
            site()['id'],
            $lesson['id'],
            $user['id']
        );
    }

    /**
     * 用户所有考试记录
     * @param EduLesson $lesson
     * @param User $user
     * @return Collection
     * @throws \Exception
     */
    public function getUserExamByLesson(EduLesson $lesson, User $user): Collection
    {
        return cache()->rememberForever($this->cacheKey($lesson, $user), function () use ($user, $lesson) {
                return $this->instance
                    ->where('site_id', \site()['id'])
                    ->where('lesson_id', $lesson['id'])
                    ->where('user_id', $user['id'])
                    ->get();
            }) ?? collect();
    }

    /**
     * 学习课程验证
     * @param EduVideo $video
     * @param User $user
     * @return bool
     * @throws \Exception
     */
    public function examVerify(EduVideo $video, User $user): bool
    {
        static $videos = null;
        $videos = $videos ?? $this->getUserExamByLesson($video->lesson, $user);
        $exam = $videos->where('video_id', $video['id'])->last();
        return $exam && $exam['grade'] == 100;
    }
}