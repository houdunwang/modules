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
    /**
     * 评论关联
     * @return mixed
     */
    public function comments()
    {
        return $this->morphMany(Content::class, 'comment')->with('reply','user');
    }

    /**
     * 系统会在点赞动作后执行这个方法
     * @return bool
     */
    public function commentCreated()
    {
        \DB::table($this->getTable())->where('id', $this['id'])->update([
            'comment_num' => $this->comments()->count(),
        ]);
    }
}