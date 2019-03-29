<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 模型管理
 * Class ArticleModel
 * @package Modules\Article\Entities
 */
class ArticleModel extends Model
{
    protected $fillable = ['name', 'site_id'];

    public function scopeSite($query)
    {
        return $query->where('site_id', \site()['id']);
    }
}
