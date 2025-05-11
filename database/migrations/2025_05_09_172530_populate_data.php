<?php

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        ArticleCategory::factory()->count(5)->make()->each(function ($category) {
            $category->state = rand(0, 1) ? 'created' : 'published';
            $category->save();
            Article::factory()->count(5)->make()->each(function ($article) use ($category) {
                $article->state = rand(0, 1) ? 'draft' : 'published';
                $article->likes_count = rand(0, 10);
                $article->category()->associate($category);
                $article->save();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
