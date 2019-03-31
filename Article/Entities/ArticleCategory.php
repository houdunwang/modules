<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = ['title', 'url', 'model_id', 'site_id', 'description', 'tpl_index', 'tpl_list', 'tpl_content', 'parent_id', 'content'];

    /**
     * 与内容模型的关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function models()
    {
        return $this->belongsTo(ArticleModel::class, 'model_id');
    }
}
