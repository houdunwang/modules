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
    use Site, LogsActivity;
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

    public function getLink()
    {
        return route('edu.front.sign.index');
    }

    public function getTitle()
    {
        return '完成签到 '.$this['content'];
    }
}
