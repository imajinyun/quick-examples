<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Owner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $carIds = Car::all()->pluck('id')->toArray();
        return [
            'car_id' => $this->faker->randomElement($carIds),
            'name' => $this->faker->name,
        ];
    }
}
