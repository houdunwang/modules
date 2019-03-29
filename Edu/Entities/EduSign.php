<?php

namespace Modules\Edu\Entities;

use App\Traits\ActivityRecord;
use App\Traits\Favour;
use App\Traits\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 网站签到
 * Class EduSign
 * @package Modules\Edu\Entities
 */
class EduSign extends Model
{
    use Site, Favour, LogsActivity, ActivityRecord;
    protected $fillable = ['content', 'mood', 'user_id', 'site_id'];
    protected static $recordEvents = ['created'];
    //全站动态
    protected static $logName = 'edu_sign';

    /**
     * 签到统计信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function info()
    {
        return $this->hasOne(EduSignTotal::class, 'user_id', 'user_id');
    }

    /**
     * 用户关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getActivityLink()
    {
        return route('edu.front.sign.index');
    }

    public function getActivityTitle()
    {
        return '完成签到 '.$this['content'];
    }

    /**
     * 点赞
     * @return bool
     */
    public function favourUpdate()
    {
        $this['favour_count'] = $this->favourCount();
        return $this->save();
    }
}
