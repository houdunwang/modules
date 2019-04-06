<?php

namespace Modules\Edu\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\EduBlog;

class BlogPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return auth()->check();
    }

    public function update(User $user, EduBlog $blog)
    {
        return $blog['user_id'] == $user['id'];
    }

    public function delete(User $user, EduBlog $blog)
    {
        return $blog['user_id'] == $user['id'];
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
