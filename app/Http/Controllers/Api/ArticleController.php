<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct(private ArticleService $articleService) {}

    /**
     * Display a listing of all articles.
     */
    public function index(): JsonResponse
    {
        $articles = $this->articleService->getAllArticles();

        return response()->json(['articles' => $articles]);
    }

    /**
     * Store a newly created article.
     */
    public function store(ArticleRequest $request): JsonResponse
    {
        $article = $this->articleService->createArticle($request->validated());

        return response()->json($article, 201);
    }

    /**
     * Display a specific article.
     */
    public function show(Article $id): JsonResponse
    {
        $article = $this->articleService->getArticle($id);

        return response()->json($article);
    }

    /**
     * Update a specific article.
     */
    public function update(ArticleRequest $request, Article $id): JsonResponse
    {
        $article = $this->articleService->updateArticle($id, $request->validated());

        return response()->json($article);
    }

    /**
     * Delete a specific article.
     */
    public function destroy(Article $id): JsonResponse
    {
        $this->articleService->deleteArticle($id);

        return response()->json(['message' => 'Article deleted'], 200);
    }

    public function addArticleToCategory(int $articleId, int $categoryId): JsonResponse
    {
        $this->articleService->addArticleToCategory($articleId, $categoryId);


        return response()->json(['message' => 'Article added to category'], 200);
    }
}
