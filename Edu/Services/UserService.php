<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Services;

use App\User;
use Modules\Edu\Entities\EduDuration;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduVideo;
use Modules\Edu\Repositories\DurationRepository;
use Modules\Edu\Repositories\ExamRepository;
use Modules\Edu\Repositories\UserVideoRepository;

class UserService
{
    /**
     * 视频学习完成检测
     * @param EduVideo $video
     * @param User $user
     * @return mixed
     */
    public function videoIsLearn(EduVideo $video, ?User $user)
    {
        if ($user) {
            $isRead = app(UserVideoRepository::class)->isLearnVideo($video, $user);
            if ($video['question']) {
                return app(ExamRepository::class)->examVerify($video, $user);
            }
            return $isRead;
        }
        return false;
    }

    /**
     * 设置会员到期时间
     * @param int $month 月数
     * @param User $user 用户
     * @return mixed
     */
    public function addDuration(int $month, User $user)
    {
        $duration = EduDuration::firstOrCreate(
            ['site_id' => \site()['id'], 'user_id' => $user['id']],
            ['begin_time' => now(), 'end_time' => now()]
        );
        if (now() > $duration['end_time']) {
            $duration['end_time'] = now()->addMonth($month);
        } else {
            $duration['end_time'] = $duration['end_time']->addMonth($month);
        }
        return $duration->save();
    }

    /**
     * 播放视频检测
     * @param EduVideo $video
     * @param User $user
     * @return bool
     */
    public function canPlayVideo(EduVideo $video, User $user): bool
    {
        if ($video->lesson['free']) {
            return true;
        }
        //订阅用户免费
        if ($video->lesson->subscribe_free_play) {
            $duration = app(DurationRepository::class)->getUserInfo($user);
            if ($duration['end_time'] > now()) {
                return true;
            }
        }
        foreach ($video->lesson->video as $i => $v) {
            if ($i > $video['lesson']['free_num']) {
                return false;
            } elseif ($video['id'] == $v['id']) {
                return true;
            }
        }
        return false;
    }
}