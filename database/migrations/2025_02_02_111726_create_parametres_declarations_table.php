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
        Schema::create('parametres_declarations', function (Blueprint $table) {
            $table->id("id_parametres_declarations");
            $table->enum( 'declaration_type',['paies', 'Achats', 'Ventes', 'Salaires', 'Autres']);
            $table->foreignId('id_accountant')->constrained('accountants', 'idAccountant')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametres_declarations');
    }
};
