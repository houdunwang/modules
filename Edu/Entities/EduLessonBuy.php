<?php

namespace Modules\Edu\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员购买课程
 * Class EduLessonBuy
 * @package Modules\Edu\Entities
 */
class EduLessonBuy extends Model
{
    protected $fillable = ['site_id', 'user_id', 'lesson_id'];

}
