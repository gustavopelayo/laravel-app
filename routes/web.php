<?php

use Illuminate\Support\Facades\Route;

// keep only your web pages here, no articles API yet
Route::get('/', function () {
    return view('welcome');
});
