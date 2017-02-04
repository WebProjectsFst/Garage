<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployyesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('employees', function(Blueprint $table){
        $table->string('NSS', 8)->primary();
        $table->string('email', 100);
        $table->string('password', 100);
        $table->string('nom', 100);
        $table->string('prenom', 100);
        $table->date('DN');
        $table->string('CIN', 8);
        $table->string('SF', 20);
        $table->string('adresse', 200);
        $table->string('tel', 8);
        $table->integer('type');
        $table->double('salaire');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
