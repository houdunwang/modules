<?php

namespace Modules\Edu\Entities;

use App\Traits\ActivityRecord;
use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 考试
 * Class EduExam
 * @package Modules\Edu\Entities
 */
class EduExam extends Model
{
    use Site, LogsActivity, ActivityRecord;

    protected $fillable = ['user_id', 'site_id', 'grade', 'video_id', 'lesson_id'];
    protected static $recordEvents = ['created'];
    protected static $logName = 'edu_exam';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(EduVideo::class, 'video_id');
    }

    public function getActivityLink()
    {
        return route('edu.front.exam.show', $this->video);
    }

    public function getActivityTitle()
    {
        $title = mb_substr($this->video->title, 0, 80, 'utf-8');
        return '参加了 《' . preg_replace('/^\s*\d+\s*/','',$title).'》的考试，成绩是'.$this['grade'].'分';
    }
}
