<?php
/**
 * Created by PhpStorm.
 * User: hdxj
 * Date: 2019/3/28
 * Time: 21:03
 */

namespace Modules\Article\Repositories;

use App\Repositories\Repository;
use Houdunwang\Arr\Arr;
use Modules\Article\Entities\ArticleCategory;

/**
 * 栏目数据仓库
 * Class CategoryRepository
 * @package Modules\Article\Repositories
 */
class CategoryRepository extends Repository
{
    protected $model = ArticleCategory::class;

    public function create(array $attributes)
    {
        $attributes['site_id'] = \site()['id'];
        return parent::create($attributes);
    }

    public function tree(ArticleCategory $category = null)
    {
        $categories = $this->instance->get();
        $data = (new Arr())->tree($categories, 'title', 'id', 'parent_id');
        foreach ($data as $k => $v) {
            $data[$k]['disabled'] = false;
            $data[$k]['selected'] = false;
            if ($category) {
                $data[$k]['selected'] = $category['parent_id'] == $v['id'];
                $data[$k]['disabled'] = $category['id'] == $v['id']
                    || (new Arr())->isChild($categories, $v['id'],$category['id'], 'id', 'parent_id');
            }
        }
        return $data;
    }
}
