<?php
namespace Modules\Blog\Entities;

use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;

/**
 * 内容
 * Class BlogArticle
 * @package Modules\Edu\Entities
 */
class BlogArticle extends Model
{
    use Site;
    protected $fillable = ['site_id','title','content'];
    /**
     * 内容标题
     */
    public function getTitle()
    {
    }
    /**
     * 前台显示链接
     */
    public function getLink()
    {
    }
}
