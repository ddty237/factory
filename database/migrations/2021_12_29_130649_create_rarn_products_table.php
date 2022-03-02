<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRarnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rarn_products', function (Blueprint $table) {
            $table->id();
            $table->string('bloc_numero');
            $table->bigInteger('format_id');
            $table->bigInteger('quantites');
            $table->date('date_attribution')->nullable();
            $table->bigInteger('data_facturation_id')->nullable();
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
        Schema::dropIfExists('rarn_products');
    }
}
