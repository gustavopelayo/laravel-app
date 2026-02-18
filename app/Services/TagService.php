<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagService
{
    /**
     * Get all Tags.
     */
    public function getAllTags(): Collection
    {
        return Tag::all();
    }

    /**
     * Create a new Tag.
     */
    public function createTag(array $data): Tag
    {
        return Tag::create($data);
    }

    /**
     * Get an Tag by ID.
     */
    public function getTag(Tag $Tag): Tag
    {
        return $Tag;
    }

    /**
     * Update an Tag.
     */
    public function updateTag(Tag $Tag, array $data): Tag
    {
        $Tag->update($data);

        return $Tag;
    }

    /**
     * Delete an Tag.
     */
    public function deleteTag(Tag $Tag): bool
    {
        return $Tag->delete();
    }

    public function addTagToArticle(Article $article, Tag $tag): void
    {
        if ($article->tags()->where('tag_id', $tag->id)->exists()) {
            throw new \Exception('This tag is already associated with this article.');
        }

        $article->tags()->attach($tag->id);
    }
}
