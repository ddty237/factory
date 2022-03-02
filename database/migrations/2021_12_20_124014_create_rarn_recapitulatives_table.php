<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRarnRecapitulativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rarn_recapitulatives', function (Blueprint $table) {
            $table->id();
            $table->string('format');
            $table->string('type_numero')->nullable();
            $table->bigInteger('redevance_attribution_annuel')->default(0);
            $table->bigInteger('redevance_reservation_annuel')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rarn_recapitulatives');
    }
}
