<?php

namespace Database\Seeders;

use App\Models\Mechanic;
use Illuminate\Database\Seeder;

class MechanicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Mechanic::factory()
            ->times(20)
            ->create();
    }
}
