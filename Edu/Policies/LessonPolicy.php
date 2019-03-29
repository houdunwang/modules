<?php

namespace Modules\Edu\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\EduLesson;

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

    public function __construct()
    {
        //
    }
}
