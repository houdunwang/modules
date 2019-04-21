<?php
namespace Modules\Edu\Entities;

use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;

/**
 * 广告推荐
 * Class EduAd
 * @package Modules\Edu\Entities
 */
class EduAd extends Model
{
    use Site;
    protected $fillable = ['site_id','title','url'];
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
