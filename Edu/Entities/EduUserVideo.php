<?php

namespace Modules\Edu\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 用户观看记录
 * Class UserVideo
 * @package Modules\Edu\Entities
 */
class EduUserVideo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['lesson_id', 'video_id', 'user_id', 'site_id'];

    public function video()
    {
        return $this->belongsTo(EduVideo::class, 'video_id', 'id');
    }

    public function lesson()
    {
        return $this->belongsTo(EduLesson::class, 'lesson_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
