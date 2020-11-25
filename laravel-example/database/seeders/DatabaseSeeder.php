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
        $this->call(UserTableSeeder::class);
        $this->call(UserDegreesTableSeeder::class);
        $this->call(ArticleCategoryTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(ArticleCommentTableSeeder::class);
    }
}
