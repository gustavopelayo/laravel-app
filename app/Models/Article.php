<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = ['id', 'title', 'slug', 'body', 'type', 'published_at', 'book_title', 'book_author', 'rating', 'etc.'];
}
