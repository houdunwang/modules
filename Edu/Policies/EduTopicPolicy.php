<?php

namespace Modules\Edu\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\EduTopic;

class EduTopicPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, EduTopic $topic)
    {
        return $user['id'] == $topic['id'] || is_site_manage();
    }

    public function destroy(User $user, EduTopic $topic)
    {
        return $user['id'] == $topic['id'] || is_site_manage();
    }

    public function recommend(User $user, EduTopic $topic)
    {
        return is_site_manage();
    }
}
