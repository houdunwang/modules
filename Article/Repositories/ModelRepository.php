<?php

namespace Modules\Article\Repositories;

use App\Repositories\Repository;
use Modules\Article\Entities\ArticleModel;

class ModelRepository extends Repository
{
    protected $model = ArticleModel::class;

    /**
     * 统计模型数量
     * @return mixed
     */
    public function count()
    {
        return $this->instance->where('site_id', site()['id'])->count();
    }

    public function all(array $columns = ['*'])
    {
        return $this->instance->where('site_id', site()['id'])->get();
    }

}
