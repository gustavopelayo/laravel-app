<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// Articles routes
Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::put('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

require __DIR__.'/settings.php';
