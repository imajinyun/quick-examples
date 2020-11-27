<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(CountriesTableSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(UserDegreesTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);

        $this->call(ArticleCategoryTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(ArticleCommentTableSeeder::class);

        $this->call(MechanicsTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(OwnersTableSeeder::class);
    }
}
