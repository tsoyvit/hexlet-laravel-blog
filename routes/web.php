<?php

use App\Http\Controllers\PageController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('about', [PageController::class, 'about'])->name('about');

Route::get('articles', function () {
    $articles = Article::all()->toArray();
    return view('articles', compact('articles'));
})->name('articles');
