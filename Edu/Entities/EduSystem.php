<?php
namespace Modules\Edu\Entities;

use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;

/**
 * 系统课程
 * Class EduSystem
 * @package Modules\Edu\Entities
 */
class EduSystem extends Model
{
    use Site;
    protected $fillable = ['site_id', 'title', 'introduce', 'lessons', 'thumb', 'user_id'];

    public function lessons()
    {
        return $this->belongsToMany('Modules\Edu\Entities\EduLesson', 'edu_system_lesson', 'system_id', 'lesson_id');
    }

    /**
     * 内容标题
     */
    public function getTitle()
    { }
    /**
     * 前台显示链接
     */
    public function getLink()
    { }
}
