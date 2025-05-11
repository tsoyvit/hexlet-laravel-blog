<?php

namespace Database\Factories;

use App\Models\{Article, ArticleCategory};
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'state' => 'published',
            'body' => $this->faker->text,
            'category_id' => function () {
                return ArticleCategory::factory()->create()->id;
            },
        ];
    }
}
