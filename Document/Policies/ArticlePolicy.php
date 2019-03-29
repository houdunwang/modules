<?php

namespace Modules\Document\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Document\Entities\DocumentArticle;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function update(User $user, DocumentArticle $model)
    {
        return $user['id'] == $model['user_id'] || is_site_manage();
    }

    public function delete(User $user, DocumentArticle $model)
    {
        return $user['id'] == $model['user_id'] || is_site_manage();
    }

    public function create(User $user)
    {
    }

}
