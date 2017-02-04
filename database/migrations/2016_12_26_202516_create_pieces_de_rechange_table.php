<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiecesDeRechangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces_rechange', function(Blueprint $table){
          $table->string('reference', 80)->primary();
          $table->string('marque', 80);
          $table->double('prix');
          $table->string('type', 80);
          $table->string('libelle', 100);
          $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pieces_rechange');
    }
}
