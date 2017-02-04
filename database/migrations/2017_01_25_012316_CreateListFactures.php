<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListFactures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function(Blueprint $table){
            $table->increments('id');
            $table->timestamp('date_payement')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('id_fiche_prestation')->unsigned();
            $table->foreign('id_fiche_prestation')->references('id')->on('fiches_prestation');
            $table->boolean('status');
            $table->double('montant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('factures');
    }
}
