<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class EduSignTotal extends Model
{
    protected $fillable = ['user_id', 'total', 'month', 'site_id'];
}
