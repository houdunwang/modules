<?php

namespace Modules\Comment\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Comment\Entities\Content;

class ContentPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, ShopModule $module)
    {
        //is_site_manage 函数判断是当前用户是否为管理员或操作员
        return $user['id'] == $module['user_id'] || is_site_manage();
    }

    public function delete(User $user, Content $model)
    {
        return is_super_admin() || $model['id'] == $user['id'];
    }

    public function create(User $user)
    {
    }
}
