<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id()->comment('主键 ID');
            $table->unsignedBigInteger('car_id')->comment('汽车 ID');
            $table->string('name')->comment('车主名');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE owners comment '车主表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owners');
    }
}
