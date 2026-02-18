<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            // Genres
            'mystery',
            'crime',
            'noir',
            'historical-fiction',
            'wwii',
            'slow-burn',
            'character-driven',
            'page-turner',
            'short-book',
            'long-book',

            // Feel / tone
            'dark',
            'hopeful',
            'cozy',
            'intense',
            'atmospheric',
            'emotional',
            'funny',

            // Format / status
            'ebook',
            'paperback',
            'audiobook',
            'reread',
            'dnf',

            // Travel
            'city-break',
            'road-trip',
            'mountains',
            'beach',
            'weekend-trip',

            // Work / tech
            'php',
            'laravel',
            'symfony',
            'backend',
            'architecture',
            'testing',
        ];



        foreach ($tags as $name) {
            Tag::create([
                'name'        => $name,
                'slug'        => Str::slug($name),
            ]);

        }

        $mysteryTagId = Tag::where('name','mystery')->value('id');
        $categoryId = Category::where('name', 'Book reviews')->value('id');
        $bookArticleIds = Article::where('category_id', $categoryId)->pluck('id');

        foreach ($bookArticleIds as $articleId) {
            ArticleTag::create([
                'article_id' => $articleId,
                'tag_id' => $mysteryTagId,
            ]);
        }

    }
}

