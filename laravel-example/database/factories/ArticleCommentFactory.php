<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::all()->pluck('id')->toArray();
        $articleIds = Article::all()->pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'article_id' => $this->faker->randomElement($articleIds),
            'title' => $this->faker->catchPhrase,
            'content' => $this->faker->sentence(),
        ];
    }
}
