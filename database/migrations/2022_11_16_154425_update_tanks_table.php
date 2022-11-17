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
        Schema::table('tanks', function (Blueprint $table) {
            /* Crea la llave forenea a la tabla de nations */
            /* Tenemos los deletes y updates en cascada, pero esperemos no usarlos
                sobre todo borrar */
            $table->after('country', function ($table){
                $table->foreignId('nations_id')->constrained('nations')->onUpdate('cascade')->onDelete('cascade');
            });
            /* Tumba la columna de country */
            $table->dropColumn('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanks');
    }
};
