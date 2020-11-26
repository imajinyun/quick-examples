<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roles = [
            '运营', '测试', '开发', '维护', '教师',
            '市场', '采购', '行政', '账务', '产品',
        ];
        return [
            'name' => $this->faker->unique()->randomElement($roles),
            'description' => $this->faker->sentence(),
        ];
    }
}
