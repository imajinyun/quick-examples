<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id()->comment('主键 ID');
            $table->string('name')->comment('角色名称');
            $table->string('description')->comment('角色描述');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE roles comment '角色表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
}
