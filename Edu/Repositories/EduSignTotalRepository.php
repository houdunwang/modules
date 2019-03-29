<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-10
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Edu\Repositories;

use App\Repositories\Repository;
use Modules\Edu\Entities\EduSign;
use Modules\Edu\Entities\EduSignTotal;
use App\User;

/**
 * 签到统计
 * Class EduSignTotalRepository
 * @package App\Repositories
 */
class EduSignTotalRepository extends Repository
{
    protected $model = EduSignTotal::class;

    /**
     * 更新用户签到数据
     * @return mixed
     */
    public function log()
    {
        $attributes = [
            'user_id' => auth()->id(),
            'site_id' => \site()['id'],
            'total' => EduSign::where('user_id', auth()->id())->count(),
            'month' => EduSign::where('user_id', auth()->id())->whereMonth('created_at', date('m'))->count(),
        ];
        return EduSignTotal::updateOrCreate(['user_id' => auth()->id()], $attributes);
    }

    /**
     * 用户签到信息
     * @param User $user
     * @return mixed
     */
    public function userInfo(User $user)
    {
        return $this->instance->where('user_id', $user['id'])->first();
    }
}