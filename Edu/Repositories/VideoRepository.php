<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/16
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Repositories;

use App\Repositories\Repository;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduVideo;

/**
 * 课程视频
 * Class VideoRepository
 * @package Modules\Edu\Repositories
 */
class VideoRepository extends Repository
{
    protected $model = EduVideo::class;

    public function getALlByLesson(EduLesson $lesson)
    {
        return $this->instance->where('lesson_id', $lesson['id'])->oldest('rank')->oldest('id')->get();
    }
}