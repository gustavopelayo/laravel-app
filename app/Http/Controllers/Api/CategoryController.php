<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService) {}

    /**
     * Display a listing of all Categories.
     */
    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getAllCategories();
        return response()->json(['categories' => $categories]);
    }

    /**
     * Store a newly created Category.
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->createCategory($request->validated());

        return response()->json($category, 201);
    }

    /**
     * Display a specific Category.
     */
    public function show(Category $id): JsonResponse
    {
        $category = $this->categoryService->getCategory($id);

        return response()->json($category);
    }

    /**
     * Update a specific Category.
     */
    public function update(CategoryRequest $request, Category $id): JsonResponse
    {
        $category = $this->categoryService->updateCategory($id, $request->validated());

        return response()->json($category);
    }

    /**
     * Delete a specific Category.
     */
    public function destroy(Category $id): JsonResponse
    {
        $this->categoryService->deleteCategory($id);

        return response()->json(['message' => 'Category deleted'], 200);
    }
}
