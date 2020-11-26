<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserDegree;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDegreeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDegree::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $userIds = User::all()->pluck('id')->toArray();
        return [
            'user_id' => $this->faker->unique()->randomElement($userIds),
            'school_code' => $this->faker->ean8,
            'school_name' => $this->faker->state,
            'major_code' => $this->faker->ean13,
            'major_name' => $this->faker->streetName,
        ];
    }
}
