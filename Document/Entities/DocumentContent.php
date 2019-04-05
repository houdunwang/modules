<?php

namespace Modules\Document\Entities;

use App\Traits\Favour;
use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;

class DocumentContent extends Model
{
    use Site;
    protected $fillable = ['title', 'markdown', 'html', 'article_id', 'parent_id', 'rank'];

    public function article()
    {
        return $this->belongsTo(DocumentArticle::class, 'article_id');
    }

    public function favourUpdate()
    {
        \DB::table($this->getTable())->where('id', $this['id'])->update([
            'favour_count' => $this->favourCount(),
        ]);
    }
}
