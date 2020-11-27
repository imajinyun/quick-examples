<?php

namespace Database\Seeders;

use CreateOwnersTable;
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
        // One to One
        $this->call(UserTableSeeder::class);
        $this->call(UserDegreesTableSeeder::class);

        // Many to Many
        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);

        // One to Many
        $this->call(ArticleCategoryTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(ArticleCommentTableSeeder::class);

        // Has One Through
        $this->call(MechanicsTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(OwnersTableSeeder::class);
    }
}
