<?php

   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   class AddUserIdToProdutosTable extends Migration
   {
       /**
        * Run the migrations.
        *
        * @return void
        */
       public function up()
       {
           Schema::table('produtos', function (Blueprint $table) {
               $table->unsignedBigInteger('user_id')->nullable()->after('fornecedor_id'); // Adiciona a coluna 'user_id' após 'fornecedor_id'
               $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Define a chave estrangeira
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
               $table->dropForeign(['user_id']); // Remove a chave estrangeira
               $table->dropColumn('user_id'); // Remove a coluna 'user_id'
           });
       }
   }