<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id()->comment('主键 ID');
            $table->string('url')->comment('链接地址');
            $table->unsignedBigInteger('imageable_id')->comment('归属模型 ID');
            $table->string('imageable_type')->comment('归属模型名称');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE images comment '图片表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
}
