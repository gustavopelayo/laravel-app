<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{
    /**
     * Get all articles.
     */
    public function getAllArticles(): Collection
    {
        return Article::all();
    }

    /**
     * Create a new article.
     */
    public function createArticle(array $data): Article
    {
        return Article::create($data);
    }

    /**
     * Get an article by ID.
     */
    public function getArticle(Article $article): Article
    {
        return $article;
    }

    /**
     * Update an article.
     */
    public function updateArticle(Article $article, array $data): Article
    {
        $article->update($data);

        return $article;
    }

    /**
     * Delete an article.
     */
    public function deleteArticle(Article $article): bool
    {
        return $article->delete();
    }

    public function addArticleToCategory(int $articleId, int $categoryId): bool
    {
        $article = Article::findOrFail($articleId);
        $article->category_id = $categoryId;
        $article->save();
        return true;
    }
}
