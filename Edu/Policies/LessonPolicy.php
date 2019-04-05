<?php

namespace Modules\Edu\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduLessonBuy;
use Modules\Edu\Services\UserService;

class LessonPolicy
{
    use HandlesAuthorization;

    public function update(User $user, EduLesson $lesson)
    {
        return is_super_admin() || $user['id'] == $lesson['user_id'];
    }

    public function destroy(User $user, EduLesson $lesson)
    {
        return is_super_admin() || $user['id'] == $lesson['user_id'];
    }

    public function recommend(User $user, EduLesson $lesson)
    {
        return is_site_manage();
    }

    /**
     * 需要购买
     * @param User $user
     * @param EduLesson $lesson
     * @return bool
     */
    public function buy(User $user, EduLesson $lesson)
    {
        if ($lesson['free']) {
            return false;
        }
        $userServer = new UserService();
        //订阅检测
        if ($lesson['subscribe_free_play'] && $userServer->subscribeCheck($user)) {
            return false;
        }
        //单独购买
        if ($lesson['price'] > 0 && $userServer->isBuy($user, $lesson)) {
            return false;
        }
        return true;
    }

    public function __construct()
    {
    }
}
