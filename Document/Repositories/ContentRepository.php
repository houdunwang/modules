<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Modules\Document\Repositories;

use App\Repositories\Repository;
use Houdunwang\Arr\Arr;
use Modules\Document\Entities\DocumentArticle;
use Modules\Document\Entities\DocumentContent;

class ContentRepository extends Repository
{
    public $model = DocumentContent::class;

    public function tree(DocumentArticle $article)
    {
        $contents = $article->contents()
            ->orderBy('rank', 'ASC')->orderBy('id', 'ASC')
            ->select('title', 'id', 'rank', 'parent_id','markdown')
            ->get()->toArray();
        return $contents = (new Arr())->channelLevel(
            $contents, 0, '&nbsp;', 'id', 'parent_id', false
        );
    }

    /**
     * 包含子菜单检测
     * @param DocumentContent $content
     * @return bool
     */
    public function hasChildMenu(DocumentContent $content)
    {
        return $this->instance->where('parent_id', $content['id'])->first() ? true : false;
    }
}