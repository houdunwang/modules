<?php

namespace Modules\Edu\Entities;

use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Traits\Comment;

/**
 * 视频播客
 * Class EduBlog
 * @package Modules\Edu\Entities
 */
class EduBlog extends Model
{
    use Site, Comment;
    protected $fillable = ['title', 'thumb', 'site_id', 'user_id', 'path'];

    public function getTitle()
    {
        return $this['title'];
    }

    public function getLink()
    {
        return module_link('edu.front.blog.show', $this);
    }
}
