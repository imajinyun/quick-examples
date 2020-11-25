<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
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
    public function definition(): array
    {
        $userIds = User::all()->pluck('id')->toArray();
        $categoryIds = ArticleCategory::all()->pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'category_id' => $this->faker->randomElement($categoryIds),
            'title' => $this->faker->sentence,
            'subtitle' => $this->faker->slug,
            'content' => $this->faker->text(),
        ];
    }
}
