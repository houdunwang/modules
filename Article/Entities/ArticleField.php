<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 模型字段
 * Class ArticleField
 * @package Modules\Article\Entities
 */
class ArticleField extends Model
{
    protected $fillable = ['title', 'name', 'placeholder', 'rule', 'site_id', 'model_id','field'];
    protected $casts = [
        'field' => 'array',
    ];
}
