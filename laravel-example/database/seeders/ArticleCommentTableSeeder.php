<?php

namespace Database\Seeders;

use App\Models\ArticleComment;
use Illuminate\Database\Seeder;

class ArticleCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ArticleComment::factory()
            ->times(1000)
            ->create();
    }
}
