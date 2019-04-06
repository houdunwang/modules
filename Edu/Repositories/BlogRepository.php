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
use Modules\Edu\Entities\EduBlog;

class BlogRepository extends Repository
{
    protected $model = EduBlog::class;

    /**
     * 根据用户获取播客
     * @param User $user
     * @param int $row
     * @return mixed
     */
    public function paginateByUser(User $user, $row = 10)
    {
        $where = [
            ['site_id', site()['id']],
            ['user_id', $user['id']],
        ];
        return $this->instance->where($where)->latest('id')->paginate($row);
    }

    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        $where = [
            ['site_id', site()['id']],
        ];
        $this->instance->where($where);
        return parent::paginate($row, $columns, $latest);
    }

    public function create(array $attributes)
    {
        $attributes['site_id'] = site()['id'];
        $attributes['user_id'] = auth()->id();
        return parent::create($attributes);
    }

}