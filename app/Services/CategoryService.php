<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * Get all Categories.
     */
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    /**
     * Create a new Category.
     */
    public function createCategory(array $data): Category
    {
        $allCategories = Category::all();
        foreach ($allCategories as $existingCategory) {
            if ($existingCategory->name === $data['name']) {
                throw new \Exception('Category name must be unique.');
            }
        }
        return Category::create($data);

    }

    /**
     * Get a Category by ID.
     */
    public function getCategory(Category $category): Category
    {
        return $category;
    }

    /**
     * Update a Category.
     */
    public function updateCategory(Category $category, array $data): Category
    {
        $category->update($data);

        return $category;
    }

    /**
     * Delete a Category.
     */
    public function deleteCategory(Category $category): bool
    {
        return $category->delete();
    }
}
