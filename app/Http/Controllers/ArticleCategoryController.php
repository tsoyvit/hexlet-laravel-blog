<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ArticleCategoryController extends Controller
{
    public function index()
    {
        $articleCategories = ArticleCategory::paginate(6);
        return view('article_category.index', compact('articleCategories'));
    }

    public function show($id)
    {
        $category = ArticleCategory::findOrFail($id);
        return view('article_category.show', compact('category'));
    }

    public function create()
    {
        $articleCategory = new ArticleCategory();
        return view('article_category.create', compact('articleCategory'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:100', 'unique:article_categories,name'],
            'description' => ['required', 'min:5'],
            'state' => ['required', 'in:draft,published'],
        ]);

        $articleCategory = new ArticleCategory();
        $articleCategory->fill($data);
        $articleCategory->save();
        return redirect(route('article_categories.index'))
            ->with('success', 'Article Category created successfully');
    }

    public function edit($id)
    {
        $articleCategory = ArticleCategory::findOrFail($id);
        return view('article_category.edit', compact('articleCategory'));
    }

    public function update(Request $request, $id)
    {
        $articleCategory = ArticleCategory::findOrFail($id);
        $data = $request->validate([
            'name' => "required|unique:article_categories,name,{$articleCategory->id}",
            'description' => 'required|min:200',
            'state' => [
                'required',
                Rule::in(['draft', 'published']),
            ]
        ]);
        $articleCategory->fill($data);
        $articleCategory->save();
        return redirect(route('article_categories.index'))
            ->with('success', 'Article Category updated successfully');

    }

    public function destroy($id)
    {
        $articleCategory = ArticleCategory::findOrFail($id);
        $articleCategory->delete();
        return redirect(route('article_categories.index'))
            ->with('success', 'Article Category deleted successfully');
    }
}
