<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestationSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches_prestation', function(Blueprint $table){
            $table->increments('id');
            /*$table->date('date_creation');*/
            $table->timestamp('date_creation')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('clients');
            $table->integer('id_prestation')->unsigned();
            $table->foreign('id_prestation')->references('id')->on('prestations');
            $table->string('diagnostiques', 400)->nullable();
            $table->string('solution', 400)->nullable();
            $table->string('type_reparation', 400)->nullable();
            $table->string('reference_piece', 80)->nullable();
            $table->foreign('reference_piece')->references('reference')->on('pieces_rechange');
            $table->string('NSS_employee', 8)->nullable();
            $table->foreign('NSS_employee')->references('NSS')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fiches_prestation');
    }
}
