<?php

namespace Modules\Edu\Entities;

use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;

/**
 * 标签关联
 * Class EduTag
 * @package Modules\Edu\Entities
 */
class EduTag extends Model
{
    use Site;

    /**
     * @var array
     */
    protected $fillable = ['name', 'site_id', 'group'];

    /**
     * 贴子
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function topic()
    {
        return $this->morphedByMany(EduTopic::class, 'tag_relation', 'edu_tag_relations');
    }

    /**
     * 课程
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function lesson()
    {
        return $this->morphedByMany(EduLesson::class, 'tag_relation', 'edu_tag_relations');
    }
}
