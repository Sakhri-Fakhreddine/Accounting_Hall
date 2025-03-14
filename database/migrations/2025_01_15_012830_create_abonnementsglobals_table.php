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
        Schema::create('abonnementsglobals', function (Blueprint $table) {
            $table->id('idabonnementglobals');
            $table->boolean('etat_abonnement')->default(0);
            $table->decimal('montant', 10, 2);
            $table->enum('typeabonnement', ['Annuel', 'Par Client']); // Adjust types as needed
            $table->unsignedBigInteger('idcomptable');
            $table->timestamps();

            // Foreign keys
            $table->foreign('idcomptable')->references('idAccountant')->on('accountants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnementsglobals');
    }
};
