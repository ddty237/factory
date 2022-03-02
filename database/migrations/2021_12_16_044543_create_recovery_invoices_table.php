<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecoveryInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recovery_invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facture_id');
            $table->string('mode_paiement');
            $table->string('reference_bancaire')->nullable();
            $table->string('justificatif_paiement')->nullable();
            $table->bigInteger('montant_recouvrer');
            $table->bigInteger('reste_montant')->default(0);
            $table->bigInteger('user_id');
            $table->date('depot_facture');
            $table->date('paiement_facture');
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
        Schema::dropIfExists('recovery_invoices');
    }
}
