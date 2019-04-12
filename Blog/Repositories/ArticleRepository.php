<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Blog\Repositories;

use App\Repositories\Repository;
use Modules\Blog\Entities\BlogArticle;

class ArticleRepository extends Repository
{
    protected $model = BlogArticle::class;

    public function create(array $attributes)
    {
        $attributes['site_id'] = site()['id'];
        $attributes['user_id'] = auth()->id();
        return parent::create($attributes);
    }

}