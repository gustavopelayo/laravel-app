<?php

// routes/api.php
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\TagController;

Route::apiResource('articles', ArticleController::class);
Route::post('articles/tags/attach', [TagController::class, 'attachToArticle']);
Route::get('articles/tags/{tag}/articles', [TagController::class, 'getAllAttachedArticles']);
