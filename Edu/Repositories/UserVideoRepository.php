<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/16
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Repositories;

use App\Repositories\Repository;
use App\User;
use Illuminate\Support\Collection;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduVideo;
use Modules\Edu\Entities\EduUserVideo;

/**
 * 用户学习记录
 * Class VideoRepository
 * @package Modules\Edu\Repositories
 */
class UserVideoRepository extends Repository
{
    protected $model = EduUserVideo::class;

    /**
     * 学习记录
     * @param EduVideo $video
     * @param User $user
     * @return bool
     * @throws \Exception
     */
    public function record(EduVideo $video, User $user)
    {
        $has = $this->instance->where('video_id', $video['id'])->first();

        if (!$has) {
            $video->userVideo()->create([
                'lesson_id' => $video['lesson_id'],
                'user_id' => auth()->id(),
                'site_id' => \site()['id'],
            ]);
        }
        cache()->forget($this->cacheKey($video->lesson, $user));
        return true;
    }

    /**
     * 获取观看视频记录不验证考试
     * @param EduLesson $lesson
     * @param User $user
     * @return bool
     * @throws \Exception
     */
    public function getVideos(EduLesson $lesson, User $user): Collection
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
     * 缓存键名
     * @param EduLesson $lesson
     * @param User $user
     * @return string
     */
    protected function cacheKey(EduLesson $lesson, User $user)
    {
        return sprintf('%s%s%s%s',
            'edu_user_video',
            site()['id'],
            $lesson['id'],
            $user['id']
        );
    }

    /**
     * 学习课程验证
     * @param EduVideo $video
     * @param User $user
     * @return bool
     * @throws \Exception
     */
    public function isLearnVideo(EduVideo $video, User $user): bool
    {
        static $videos = null;
        $videos = $videos ?? $this->getVideos($video->lesson, $user);
        return (bool)$videos->where('video_id', $video['id'])->first();
    }
}