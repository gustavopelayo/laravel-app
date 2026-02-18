<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AttachTagToArticleRequest;
use App\Http\Requests\TagRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Services\TagService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct(private TagService $tagService) {}

    /**
     * Display a listing of all Tags.
     */
    public function index(): JsonResponse
    {
        $tags = $this->tagService->getAllTags();

        return response()->json(['tags' => $tags]);
    }

    /**
     * Store a newly created Tag.
     */
    public function store(TagRequest $request): JsonResponse
    {
        $tag = $this->tagService->createTag($request->validated());

        return response()->json($tag, 201);
    }

    /**
     * Display a specific Tag.
     */
    public function show(Tag $id): JsonResponse
    {
        $tag = $this->tagService->getTag($id);

        return response()->json($tag);
    }

    /**
     * Update a specific Tag.
     */
    public function update(TagRequest $request, Tag $id): JsonResponse
    {
        $tag = $this->tagService->updateTag($id, $request->validated());

        return response()->json($tag);
    }

    /**
     * Delete a specific Tag.
     */
    public function destroy(Tag $id): JsonResponse
    {
        $this->tagService->deleteTag($id);

        return response()->json(['message' => 'Tag deleted'], 200);
    }

    /**
     * Attach a tag to an article.
     */
    public function attachToArticle(AttachTagToArticleRequest $request): JsonResponse
    {
        $article = Article::findOrFail($request->validated()['article_id']);
        $tag = Tag::findOrFail($request->validated()['tag_id']);

        $this->tagService->addTagToArticle($article, $tag);

        return response()->json(['message' => 'Tag added to article'], 200);
    }

    public function getAllAttachedArticles(Tag $tag): JsonResponse{

        $articles = $tag->articles()->get();

        return response()->json(['articles' => $articles]);
    }
}
