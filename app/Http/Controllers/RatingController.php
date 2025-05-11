<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $articles = Article::where('state', 'published')->orderBy('likes_count', 'desc')->get();
        return view('rating.index', ['articles' => $articles]);
    }
}
