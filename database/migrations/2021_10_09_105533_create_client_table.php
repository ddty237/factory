<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->bigInteger('delegation_id');
            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('phone');
            $table->integer('secondary_phone')->nullable();
            $table->string('website')->nullable();
            $table->string('reference_titre')->unique();
            $table->string('email')->nullable();
            $table->string('compte_auxilliaire')->nullable();
            $table->bigInteger('categorie_id');
            $table->string('scan_titre')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
