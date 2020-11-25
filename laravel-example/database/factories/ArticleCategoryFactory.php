<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $categories = [
            '经济', '教育', '新闻', '文化', '军事',
            '网络', '娱乐', '视频', '图片', '体育',
            '汽车', '房产', '时尚', '游戏', '科技',
        ];
        return [
            'name' => $this->faker->randomElement($categories),
        ];
    }
}
