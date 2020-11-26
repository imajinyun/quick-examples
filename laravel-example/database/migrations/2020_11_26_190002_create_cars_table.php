<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id()->comment('主键 ID');
            $table->unsignedBigInteger('mechanic_id')->comment('机械师表');
            $table->string('model')->comment('模型名');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE cars comment '汽车表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
