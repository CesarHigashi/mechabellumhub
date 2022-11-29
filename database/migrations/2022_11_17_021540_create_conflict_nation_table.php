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
        Schema::create('conflict_nation', function (Blueprint $table) {
            /* No tienen cascade por que estos no se supone que se deban de borrar */
            $table->foreignId('conflict_id')->constrained();
            $table->foreignId('nation_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conflict_nation');
    }
};
