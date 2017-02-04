<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clients', function(Blueprint $table){
        $table->increments('id');
        $table->string('cin', 8);
        $table->string('nom', 100);
        $table->string('prenom', 100);
        $table->string('tel', 8);
        $table->string('addresse', 200);
        $table->string('email', 100);
        $table->string('matricule_voiture', 50);
        $table->string('modele_voiture', 50);
        $table->string('marque_voiture', 50);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
