<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/17
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Repositories;

use App\Repositories\Repository;
use Modules\Edu\Entities\EduTag;

/**
 * 标签管理
 * Class TagRepository
 * @package Modules\Edu\Repositories
 */
class TagRepository extends Repository
{
    protected $model = EduTag::class;

    public function all(array $columns = ['*'])
    {
        return $this->instance->where('site_id', \site()['id'])->get();
    }
}