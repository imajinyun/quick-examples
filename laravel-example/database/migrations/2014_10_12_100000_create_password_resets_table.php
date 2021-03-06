<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index('idx_email')->comment('邮箱');
            $table->string('token')->comment('令牌');
            $table->timestamp('created_at')->nullable()->comment('创建时间');
        });
        DB::statement("ALTER TABLE password_resets comment '重置密码表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('password_resets');
    }
}
