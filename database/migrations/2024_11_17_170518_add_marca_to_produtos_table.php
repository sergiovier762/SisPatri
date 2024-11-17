<?php

   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   class AddMarcaToProdutosTable extends Migration
   {
       /**
        * Run the migrations.
        *
        * @return void
        */
       public function up()
       {
           Schema::table('produtos', function (Blueprint $table) {
               $table->string('marca')->nullable()->after('descricao'); // Adiciona a coluna 'marca' após 'descricao'
           });
       }

       /**
        * Reverse the migrations.
        *
        * @return void
        */
       public function down()
       {
           Schema::table('produtos', function (Blueprint $table) {
               $table->dropColumn('marca'); // Remove a coluna 'marca'
           });
       }
   }