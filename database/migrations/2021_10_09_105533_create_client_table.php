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
            $table->string('delegation');
            $table->string('ville')->nullable();
            $table->string('code_postal');
            $table->float('lat',11,8)->change();
            $table->float('lng',11,8)->change();
            $table->string('adresse');
            $table->integer('phone');
            $table->integer('secondary_phone')->nullable();
            $table->string('website')->nullable();
            $table->string('reference_titre')->unique();
            $table->string('email')->nullable();
            $table->string('compte_auxilliaire');
            $table->string('categorie');
            $table->string('scan_titre');
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
