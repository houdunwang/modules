<?php
namespace Modules\Blog\Entities;

use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;

/**
 * aa
 * Class BlogAa
 * @package Modules\Edu\Entities
 */
class BlogAa extends Model
{
    use Site;
    protected $fillable = [site_id];
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
