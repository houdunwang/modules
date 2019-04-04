<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 文章模型
 * Class ArticleContent
 * @package Modules\Article\Entities
 */
class ArticleContent extends Model
{
    protected $fillable = [
        'title',
        'content',
        'source',
        'author',
        'thumb',
        'description',
        'category_id',
        'user_id',
        'fields',
        'site_id',
    ];
    protected $casts = [
        'fields' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
