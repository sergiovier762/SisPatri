<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
   {
       Schema::table('produtos', function (Blueprint $table) {
           $table->unique('numero_patrimonio'); // Adiciona o índice único
       });
    }

    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
           $table->dropUnique(['numero_patrimonio']); // Remove o índice único
       });
   }
};
