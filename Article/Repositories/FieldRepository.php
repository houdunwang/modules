<?php

namespace Modules\Article\Repositories;


use App\Repositories\Repository;
use Modules\Article\Entities\ArticleField;

class FieldRepository extends Repository
{
    protected $model = ArticleField::class;

    public function create(array $attributes)
    {
        $attributes['site_id'] = site()['id'];
        return parent::create($attributes);
    }

}
