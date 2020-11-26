<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $userIds = User::all()->pluck('id')->toArray();
        $roleIds = Role::all()->pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($userIds),
            'role_id' => $this->faker->randomElement($roleIds),
        ];
    }
}
