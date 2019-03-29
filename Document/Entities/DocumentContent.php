<?php

namespace Modules\Document\Entities;

use App\Traits\Favour;
use Illuminate\Database\Eloquent\Model;

class DocumentContent extends Model
{
    use Favour;
    protected $fillable = ['title', 'markdown', 'html', 'article_id', 'parent_id', 'rank'];

    public function article()
    {
        return $this->belongsTo(DocumentArticle::class, 'article_id');
    }

    //返回当前模型的链接
    public function getFavourLink()
    {
        return module_link('document.front.content.show', $this);
    }

    //返回当前模型的标题
    public function getFavourTitle()
    {
        return mb_substr($this['title'], 0, 80, 'utf-8');
    }

    //系统会在点赞动作后执行这个方法
    public function favourUpdate()
    {
        $this['favour_count'] = $this->favourCount();
        return $this->save();
    }
}
