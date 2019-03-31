<?php

namespace Modules\Edu\Entities;

use App\Traits\ActivityRecord;
use App\Traits\Favorite;
use App\Traits\Favour;
use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EduLesson extends Model
{
    use Site, LogsActivity;
    protected static $recordEvents = ['created', 'updated'];
    protected static $logName = 'edu_lesson';
    protected $fillable = [
        'id',
        'title',
        'user_id',
        'site_id',
        'description',
        'thumb',
        'type',
        'free',
        'subscribe_free_play',
        'free_num',
        'price',
        'is_commend',
        'read_num',
        'times',
        'status',
        'download_address',
        'user_id',
        'rank',
        'only_down',
    ];

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function tags()
    {
        return $this->morphToMany(EduTag::class, 'tag_relation', 'edu_tag_relations');
    }

    public function hasTag(EduTag $tag)
    {
        return $this->tags->contains($tag);
    }

    public function video()
    {
        return $this->hasMany(EduVideo::class, 'lesson_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 动态链接
     * @return string
     */
    public function getLink()
    {
        return route('edu.front.lesson.show', $this);
    }

    /**
     * 动态标题
     * @return string
     */
    public function getTitle()
    {
        return "课程《" . mb_substr($this['title'], 0, 80, 'utf-8') . '》';
    }
}
