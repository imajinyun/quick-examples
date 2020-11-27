<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Mechanic;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $mechanicIds = Mechanic::all()->pluck('id')->toArray();
        return [
            'mechanic_id' => $this->faker->randomElement($mechanicIds),
            'model' => 'App\Mechanic',
        ];
    }
}
