<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/10
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Repositories;

use Modules\Edu\Entities\EduLesson;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\EduSystem;

/**
 * 课程
 * Class EduLessonRepository
 * @package App\Repositories
 */
class LessonRepository extends Repository
{
    protected $model = EduLesson::class;

    /**
     * 修改课程
     * @param array $attributes
     * @return mixed
     * @throws \Exception
     */
    public function create(array $attributes)
    {
        \DB::beginTransaction();
        $attributes['user_id'] = auth()->id();
        $attributes['site_id'] = \site()['id'];
        $lesson = $this->instance->create($attributes);
        $lesson->tags()->sync(request()->input('tags'));
        //添加视频
        $this->createOrUpdateVideo($lesson);
        \DB::commit();
        return $lesson;
    }

    /**
     * 更新课程视频
     * @param EduLesson $lesson
     * @return bool
     */
    protected function createOrUpdateVideo(EduLesson $lesson)
    {
        $videos = \json_decode(request()->input('videos'), true) ?? [];
        foreach ($videos as $rank => $video) {
            $video['rank'] = $rank;
            $video['site_id'] = site()['id'];
            $video['user_id'] = auth()->id();
            $lesson->video()->updateOrCreate(['id' => $video['id'] ?? 0], $video);
        }
        $lesson['video_num'] = $lesson->video->count();
        return $lesson->save();
    }

    /**
     * 更新课程
     * @param Model $model
     * @param array $attributes
     * @return bool
     * @throws \Exception
     */
    public function update(Model $model, array $attributes)
    {
        \DB::beginTransaction();
        parent::update($model, $attributes);
        $model->tags()->sync(request()->input('tags'));
        $this->createOrUpdateVideo($model);
        \DB::commit();
        return true;
    }

    /**
     * 删除课程
     * @param Model $lesson
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Model $lesson)
    {
        //删除视频
        \DB::beginTransaction();
        $lesson->video()->delete();
        $lesson->delete();
        \DB::commit();
        return true;
    }

    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        return $this->instance->has('video')->paginate($row);
    }

    /**
     * 最新课程
     * @param int $row
     * @return mixed
     */
    public function news($row = 5)
    {
        return $this->instance->limit($row)->latest()->get();
    }
    /**
     * 获取系统课程
     *
     * @param integer $row
     * @return void
     */
    public function getSystemLesson(int $row = 3)
    {
        $lesson = new EduSystem();
        return $lesson->where('site_id', \site()['id'])->limit($row)->latest('id')->get();
    }
}
