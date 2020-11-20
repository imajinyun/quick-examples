<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('主键 ID');
            $table->string('username')->comment('用户名称');
            $table->string('email')->unique()->comment('邮箱');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱认证时间');
            $table->string('password')->comment('用户密码');
            $table->rememberToken()->comment('记住令牌');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE users comment '用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
