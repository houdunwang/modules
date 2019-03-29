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
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 签到
 * Class EduSignRepository
 * @package App\Repositories
 */
class EduSignRepository extends Repository
{
    protected $model = EduSign::class;

    /**
     * 用户今日签到信息
     * @param User $user
     * @return mixed
     */
    public function todaySign(User $user)
    {
        return $this->instance->where('user_id', $user['id'])
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))->first();
    }

    /**
     * 新增用户签到信息
     * @param array $attributes
     * @return bool
     * @throws \Exception
     */
    public function create(array $attributes)
    {
        //签到检测
        if (!$this->todaySign(auth()->user())) {
            \DB::beginTransaction();
            $attributes['user_id'] = auth()->id();
            $attributes['site_id'] = \site()['id'];
            parent::create($attributes);
            app(EduSignTotalRepository::class)->log();
            \DB::commit();
            return true;
        }
    }

    /**
     * 获取签到数据
     * @param int $row
     * @param array $columns
     * @param null $latest
     * @return mixed
     */
    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        return $this->instance->orderBy('created_at', 'ASC')
            ->whereMonth('created_at', date('m'))
            ->whereDay('created_at', date('d'))->paginate($row, $columns);
    }

    public function delete(Model $model)
    {
        return parent::delete($model);
    }

}