<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroitsEntreesRecapitulativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droits_entrees_recapitulatives', function (Blueprint $table) {
            $table->id();
            $table->string('type_reseau');
            $table->bigInteger('montant_entree_id');
            $table->bigInteger('droit_renouvellement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('droits_entrees_recapitulatives');
    }
}
