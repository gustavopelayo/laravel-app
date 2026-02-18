<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $table = 'article_tag';
    protected $fillable = ['article_id', 'tag_id'];

     public function article()
    {
        return $this->belongsToMany(Article::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
