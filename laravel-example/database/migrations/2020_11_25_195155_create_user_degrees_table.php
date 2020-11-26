<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('user_degrees', function (Blueprint $table) {
            $table->id()->comment('主键 ID');
            $table->unsignedBigInteger('user_id')->comment('用户 ID');
            $table->string('school_code')->comment('学校代码');
            $table->string('school_name')->comment('学校名称');
            $table->string('major_code')->comment('专业代码');
            $table->string('major_name')->comment('专业名称');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE user_degrees comment '用户学位信息表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('user_degrees');
    }
}
