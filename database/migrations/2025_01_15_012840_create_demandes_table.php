<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id('iddemande');
            $table->json('details_comptable'); 
            $table->enum('typeabonnement', ['Annuel','Par Client']);
            $table->enum('etat_demande', ['en cours de traitements','acceptée','refusée']);
            $table->string('commentaire', 45)->nullable();
            $table->unsignedBigInteger('idcomptable')->nullable();
            $table->unsignedBigInteger('idabonnementglobals')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('idcomptable')->references('idAccountant')->on('accountants');
            $table->foreign('idabonnementglobals')->references('idabonnementglobals')->on('abonnementsglobals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
