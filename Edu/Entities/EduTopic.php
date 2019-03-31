<?php

namespace Modules\Edu\Entities;

use App\Traits\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Traits\Comment;
use Spatie\Activitylog\Traits\LogsActivity;

class EduTopic extends Model
{
    use Site, Comment, LogsActivity;
    protected $fillable = ['title', 'site_id', 'content', 'user_id'];

    //设置动态记录的属性，不要记录过多或过大的数据将影响性能
    protected static $logAttributes = ['title'];
    protected static $recordEvents = ['created', 'updated'];
    protected static $logName = 'edu_topic';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->morphToMany(EduTag::class, 'tag_relation', 'edu_tag_relations');
    }

    /**
     * 标签检测
     * @param EduTag $tag
     * @return mixed
     */
    public function hasTag(EduTag $tag)
    {
        return $this->tags->contains($tag);
    }


    /**
     * 链接
     * @return string
     */
    public function getLink()
    {
        return route('edu.front.topic.show', $this);
    }

    /**
     * 标题
     * @return string
     */
    public function getTitle()
    {
        return mb_substr($this['title'], 0, 80, 'utf-8')
            . (strlen($this['title']) > 80 ? '...' : '');
    }
}
