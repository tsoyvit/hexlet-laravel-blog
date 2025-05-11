<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.welcome');
})->name('welcome');

Route::get('about', [PageController::class, 'about'])->name('about');

Route::get('rating', [RatingController::class, 'index'])
    ->name('rating');

//---------------- articles --------------------------------

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

Route::patch('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');


//--------------c- article_categories --------------------------------

Route::get('article_categories', [ArticleCategoryController::class, 'index'])
    ->name('article_categories.index');

Route::get('article_categories/create', [ArticleCategoryController::class, 'create'])
    ->name('article_categories.create');

Route::post('article_categories', [ArticleCategoryController::class, 'store'])
    ->name('article_categories.store');

Route::get('article_categories/{id}', [ArticleCategoryController::class, 'show'])
    ->name('article_categories.show');
