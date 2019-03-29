<?php

namespace Modules\Edu\Entities;

use App\Traits\ActivityRecord;
use App\Traits\Favorite;
use App\Traits\Favour;
use App\Traits\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Traits\Comment;
use Spatie\Activitylog\Traits\LogsActivity;

class EduTopic extends Model
{
    use Site, Favorite, Favour, Comment, LogsActivity, ActivityRecord;
    protected $fillable = ['title', 'site_id', 'content', 'user_id'];

    //设置动态记录的属性，不要记录过多或过大的数据将影响性能
    protected static $logAttributes = ['title'];
    protected static $recordEvents = ['created'];
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
     * 返回当前模型的标题
     * @return string
     */
    public function getTitle()
    {
        return mb_substr($this['title'], 0, 80, 'utf-8');
    }

    /**
     * 返回当前模型的标题
     * @return string
     */
    public function getLink()
    {
        return route('edu.front.topic.show', $this);
    }

    /**
     * 动态链接
     * @return string
     */
    public function getActivityLink()
    {
        return route('edu.front.topic.show', $this);
    }

    /**
     * 动态标题
     * @return string
     */
    public function getActivityTitle()
    {
        return '发表文章 ' . mb_substr($this['title'], 0, 80, 'utf-8');
    }

    /**
     * 评论更新执行，可用于记更改文章评论总数
     */
    public function commentCreated()
    {
        $this['comment_num'] = $this->comments()->count();
        $this->save();
    }

    /**
     * 系统会在点赞动作后执行这个方法
     * @return bool
     */
    public function favourUpdate()
    {
        $this['favour_num'] = $this->favourCount();
        return $this->save();
    }

    /**
     * 收藏动作后执行这个方法
     * @return bool
     */
    public function favoriteUpdate()
    {
        $this['favorite_num'] = $this->favoriteCount();
        return $this->save();
    }
}
