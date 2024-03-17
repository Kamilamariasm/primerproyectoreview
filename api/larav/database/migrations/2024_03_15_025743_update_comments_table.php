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
         Schema::table('comments', function (Blueprint $table) {
            // Cambiar el tipo de datos de la columna 'user_id' a 'integer'
            $table->integer('user_id')->change();
            
            // Cambiar el tipo de datos de la columna 'review_id' a 'integer'
            $table->integer('review_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
