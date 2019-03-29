<?php
/**
 * Created by PhpStorm.
 * User: hdxj
 * Date: 2019/3/28
 * Time: 21:03
 */

namespace Modules\Article\Repositories;

use App\Repositories\Repository;
use Modules\Article\Entities\ArticleCategory;

/**
 * 栏目数据仓库
 * Class CategoryRepository
 * @package Modules\Article\Repositories
 */
class CategoryRepository extends Repository
{
    protected $model = ArticleCategory::class;
}
