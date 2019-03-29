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
use App\User;
use Modules\Edu\Entities\EduDuration;

/**
 * 会员时长
 * Class DurationServer
 * @package Modules\Edu\Repositories
 */
class DurationRepository extends Repository
{
    protected $model = EduDuration::class;

    /**
     * 获取用户时长
     * @param User $user
     * @return mixed
     */
    public function getUserInfo(User $user)
    {
        return $this->instance
            ->where('site_id', \site()['id'])
            ->where('user_id', $user['id'])->first();
    }
}