<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->comment('用户 ID');
            $table->unsignedBigInteger('role_id')->comment('角色 ID');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE user_roles comment '用户角色表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
}
