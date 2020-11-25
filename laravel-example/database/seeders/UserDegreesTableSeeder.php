<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDegree;
use Illuminate\Database\Seeder;

class UserDegreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = User::query()->count();
        UserDegree::factory()
            ->times($times)
            ->create();
    }
}
