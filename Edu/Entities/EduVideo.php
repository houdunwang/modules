<?php

namespace Modules\Edu\Entities;

use App\Traits\Favorite;
use App\Traits\Favour;
use App\Traits\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Comment\Traits\Comment;

/**
 * 课程视频
 * Class EduVideo
 * @package Modules\Edu\Entities
 */
class EduVideo extends Model
{
    use Site, Comment;

    protected $fillable =
        ['id', 'title', 'path', 'question', 'lesson_id', 'external_address', 'rank', 'site_id', 'user_id'];
    /**
     * 字段转换
     * @var array
     */
    protected $casts = [
        'question' => 'array',
    ];

    public function toSearchableArray()
    {
        return [
            'title' => $this['title'],
        ];
    }

    public function scopeSearchByLike($query, $word)
    {
        return $query->where('title', 'like', "%{$word}%");
    }

    public function getFormatTitleAttribute()
    {
        return preg_replace('/^\d+\s*/', '', $this['title']);
    }

    /**
     * 课程关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo(EduLesson::class);
    }

    public function userVideo()
    {
        return $this->hasMany(EduUserVideo::class, 'video_id', 'id');
    }

    public function exam()
    {
        return $this->hasMany(EduExam::class, 'video_id', 'id');
    }

    /**
     * 返回当前模型的链接
     * @return string
     */
    public function getLink()
    {
        return route('edu.front.video.show', $this);
    }

    /**
     * 返回当前模型的标题
     * @return string
     */
    public function getTitle()
    {
        return "视频《" . mb_substr($this['title'], 0, 80, 'utf-8') . "》";
    }

    public function scopeOrder($query, $by = 'ASC')
    {
        return $query->orderBy('rank', $by)->orderBy('id', $by);
    }

    public function getPrevVideoAttribute()
    {
        $videos = $this->lesson->video()->order('DESC')->get();
        foreach ($videos as $key => $video) {
            if ($video['id'] == $this['id']) {
                return isset($videos[$key + 1]) ? $videos[$key + 1] : null;
            }
        }
    }

    public function getNextVideoAttribute()
    {
        $videos = $this->lesson->video()->order('DESC')->get();
        foreach ($videos as $key => $video) {
            if ($video['id'] == $this['id']) {
                return isset($videos[$key - 1]) ? $videos[$key - 1] : null;
            }
        }
    }
}
