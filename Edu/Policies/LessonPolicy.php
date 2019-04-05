<?php

namespace Modules\Edu\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduLessonBuy;

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

    public function buy(User $user, EduLesson $lesson)
    {
        $where = [
            ['site_id', \site()['id']],
            ['user_id', $user['id']],
            ['lesson_id', $lesson['id']],
        ];
        return $lesson['price'] > 0 && !EduLessonBuy::where($where)->first();
    }

    public function __construct()
    {
    }
}
