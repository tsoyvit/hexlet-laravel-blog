<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property-read Collection<int, Article> $articles
 * @property-read int|null $articles_count
 * @method static \Database\Factories\ArticleCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory query()
 * @mixin Eloquent
 */
class ArticleCategory extends Model
{
    use HasFactory;

    private mixed $name;
    protected $fillable = ['name', 'description', 'state'];

    public function articles()
    {
        return $this->hasMany(__NAMESPACE__ . '\Article', 'category_id');
    }

    public function __toString()
    {
        return $this->name;
    }
}
