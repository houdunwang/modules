<?php

namespace Modules\Article\Repositories;

use App\Repositories\Repository;
use Modules\Article\Entities\ArticleContent;

/**
 * 文章内容
 * Class ContentRepository
 * @package Modules\Article\Repositories
 */
class ContentRepository extends Repository
{
    protected $model = ArticleContent::class;

    public function create(array $attributes)
    {
        $attributes['site_id'] = site()['id'];
        $attributes['user_id'] = auth()->id();
        return parent::create($attributes);
    }

}
