<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 50);
            $table->integer('year');
            $table->string('country', 25);
            $table->integer('machine_guns')->default(0);
            $table->integer('cannons')->default(0);
            $table->integer('turrets')->default(0);
            $table->integer('max_height_m');
            $table->integer('crew');
            $table->integer('max_speed_kmh');
            $table->integer('weight_kg');
            $table->string('category', 30);
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planes');
    }
};
