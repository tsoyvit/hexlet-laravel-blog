<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('name');

        $articles = $search
            ? Article::where('name', 'ilike', "%{$search}%")
                ->orderBy('created_at', 'desc')
                ->paginate(10)
            : Article::orderBy('created_at', 'desc')
                ->paginate(10);

        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        $categories = ArticleCategory::all();

        return view('article.create', compact('article', 'categories'));
    }

    public function store(ArticleRequest $request)
    {
        Article::create($request->validated());

        return redirect(route('articles.index'))
            ->with('success', 'Article created successfully');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = ArticleCategory::all();
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->validated());

        return redirect(route('articles.index'))
            ->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect(route('articles.index'))->with('success', 'Article deleted successfully');
    }
}
