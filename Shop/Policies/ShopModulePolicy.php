<?php

namespace Modules\Shop\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Shop\Entities\ShopModule;

class ShopModulePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, ShopModule $module)
    {
        return is_super_admin() || $user['id'] == $module['user_id'];
    }

    public function delete(User $user, ShopModule $module)
    {
        return is_super_admin() || $user['id'] == $module['user_id'];
    }
}
