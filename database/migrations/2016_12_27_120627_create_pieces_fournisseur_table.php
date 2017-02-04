<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiecesFournisseurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces_fournisseur', function(Blueprint $table){
          $table->integer('id_fournisseur')->unsigned();
          $table->string('reference_piece', 80);
          $table->primary(array('id_fournisseur', 'reference_piece'));
          $table->foreign('id_fournisseur')->references('id')->on('fournisseurs');
          $table->foreign('reference_piece')->references('reference')->on('pieces_rechange');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pieces_fournisseur');
    }
}
