<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Document\Repositories;

use App\Repositories\Repository;
use Houdunwang\Arr\Arr;
use Modules\Document\Entities\DocumentArticle;
use Modules\Document\Entities\DocumentContent;

class ArticleRepository extends Repository
{
    public $model = DocumentArticle::class;

    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        return $this->instance->latest($latest)->where('site_id', \site()['id'])->where('user_id',
            auth()->id())->paginate($row, $columns);
    }

    public function lists()
    {
        return DocumentArticle::has('contents')->get();
    }
}