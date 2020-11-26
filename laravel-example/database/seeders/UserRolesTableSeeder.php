<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::factory()
            ->times(10)
            ->create();
    }
}
