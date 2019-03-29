<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 会员订阅配置
 * Class EduSubscribe
 * @package Modules\Edu\Entities
 */
class EduSubscribe extends Model
{
    protected $fillable = ['site_id', 'title', 'ad', 'icon', 'price', 'month'];
    protected $casts = [
        'month' => 'integer',
    ];
}
