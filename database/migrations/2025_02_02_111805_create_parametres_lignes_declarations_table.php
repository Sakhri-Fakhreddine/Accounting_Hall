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
        Schema::create('lignes_parametres_declarations', function (Blueprint $table) {
            $table->id("id_lignes_parametres_declarations");
            $table->string("libellée");
            $table->string("compte_comptable");
            $table->enum( 'debit_credit',['debit', 'credit']);
            // Define the foreign key column
            $table->unsignedBigInteger('idparametresdeclarations');
            // Add the foreign key constraint
            $table->foreign('idparametresdeclarations')
                  ->references('id_parametres_declarations')
                  ->on('parametres_declarations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametres_lignes_declarations');
    }
};
