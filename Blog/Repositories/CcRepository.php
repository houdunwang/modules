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
use Modules\Blog\Entities\BlogCc;

class CcRepository extends Repository
{
    protected $model = BlogCc::class;
}