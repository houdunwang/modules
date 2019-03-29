<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Repositories;


use App\Repositories\Repository;
use Modules\Edu\Entities\EduTopic;

class TopicRepository extends Repository
{
    protected $model = EduTopic::class;

    public function news($row = 5)
    {
        return EduTopic::site()->latest()->limit($row)->get();
    }
}