<?php

namespace Modules\Document\Entities;

use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;

class DocumentArticle extends Model
{
    use Site;
    protected $fillable = ['title', 'site_id', 'user_id'];

    public function contents()
    {
        return $this->hasMany(DocumentContent::class,'article_id');
    }
}
