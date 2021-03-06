<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataFacturationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_facturation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id');
            $table->string('observation_general')->nullable();
            $table->bigInteger('montant_facture');
            $table->string('reference_contrat')->nullable();
            $table->string('scan_contrat')->nullable();
            $table->string('scan_donnee')->nullable();
            $table->boolean('invoice_generate')->default(false);
            $table->bigInteger('recap_products_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_facturation');
    }
}
