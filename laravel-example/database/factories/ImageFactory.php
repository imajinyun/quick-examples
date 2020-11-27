<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $random = random_int(1, 9);
        if ($random > 5) {
            $userIds = User::all()->pluck('id')->toArray();
            $imageableId = $this->faker->randomElement($userIds);
            $imageableType = 'App\Models\User';
        } else {
            $articleIds = Article::all()->pluck('id')->toArray();
            $imageableId = $this->faker->randomElement($articleIds);
            $imageableType = 'App\Models\Article';
        }
        return [
            'url' => $this->faker->imageUrl(300, 150),
            'imageable_id' => $imageableId,
            'imageable_type' => $imageableType,
        ];
    }
}
