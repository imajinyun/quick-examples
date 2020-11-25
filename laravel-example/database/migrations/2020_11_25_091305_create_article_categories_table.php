<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id()->comment('主键 ID');
            $table->string('name')->comment('文章分类名称');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE article_categories comment '文章分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('article_categories');
    }
}
