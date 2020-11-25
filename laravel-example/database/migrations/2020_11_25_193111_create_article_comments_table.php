<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('article_comments', function (Blueprint $table) {
            $table->id()->comment('主键 ID');
            $table->unsignedBigInteger('user_id')->comment('用户 ID');
            $table->unsignedBigInteger('article_id')->comment('文章 ID');
            $table->string('title')->comment('评论标题');
            $table->string('content')->comment('评论内容');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE article_comments comment '文章评论表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('article_comments');
    }
}
