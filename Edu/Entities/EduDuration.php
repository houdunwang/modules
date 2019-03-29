<?php

namespace Modules\Edu\Entities;

use App\Traits\Site;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员周期
 * Class EduDuration
 * @package Modules\Edu\Entities
 */
class EduDuration extends Model
{
    use Site;
    protected $fillable = ['site_id', 'user_id', 'begin_time', 'end_time'];

    protected $casts = [
        'begin_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
