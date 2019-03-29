# 评论模块

## 模型定义

下面以文章模型 Article 说明使用方法。

```
use Modules\Comment\Traits\Comment;
class Article extends Model
{
    //引入评论trait
    use Comment;
    
    //评论更新执行，可用于记更改文章评论总数
    public function commentCreated(){
        $this['comment_total'] = $this->comments()->count();
    }
    //返回当前模型的链接
    public function getLink(){
    }
    //返回当前模型的标题
    public function getTitle(){
    }
    ...    
}
```
引入了 trait 后可以在模型中使用 $this->comments 获取所有评论，这是一个多态关联操作。

## 前台调用 
前台使用一行代码就可以实现评论显示，参数是当前内容模型。
```$xslt
@include('comment::layouts.comment',['model'=>$topic])
```
