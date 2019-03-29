<?php

namespace Modules\Comment\Entities;

use App\Traits\ActivityRecord;
use App\Traits\Favour;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 评论内容
 * Class Content
 * @package Modules\Comment\Entities
 */
class Content extends Model
{
    use LogsActivity, ActivityRecord, Favour;
    protected $table = 'comment_contents';
    protected $fillable = ['user_id', 'comment_content', 'site_id', 'module_id', 'favour_count'];
    protected static $logAttributes = ['title', 'author_id'];
    protected static $recordEvents = ['created'];
    protected static $logName = 'comment_content';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getContentAttribute()
    {
        return \Parsedown::instance()->setBreaksEnabled(true)->text($this['comment_content']);
    }

    public function relation()
    {
        return $this->morphTo('comment');
    }

    public function favourUpdate()
    {
        $this['favour_count'] = $this->favourCount();
        return $this->save();
    }

    //返回当前模型的链接
    public function getActivityLink()
    {
        return $this->relation->getLink() . '#' . $this->id;
    }

    public function getActivityTitle()
    {
        return '发表评论 '.mb_substr(strip_tags((new \Parsedown())->text($this['comment_content'])),0,55);
    }
}
