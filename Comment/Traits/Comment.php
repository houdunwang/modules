<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Comment\Traits;

use Modules\Comment\Entities\Content;

trait Comment
{
    public function comments()
    {
        return $this->morphMany(Content::class, 'comment');
    }

    public function commentCreated()
    {

    }
}