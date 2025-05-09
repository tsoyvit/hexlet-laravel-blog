<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.welcome');
})->name('welcome');

Route::get('about', [PageController::class, 'about'])->name('about');

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
