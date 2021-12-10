<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubproductObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subproduct_observation', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('product_sub_categorie_id')->nullable();
            $table->BigInteger('product_id')->nullable();
            $table->BigInteger('data_facturation_id')->nullable();
            $table->string('observation')->nullable();
            $table->bigInteger('montant')->nullable();
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
        Schema::dropIfExists('subproduct_observation');
    }
}
