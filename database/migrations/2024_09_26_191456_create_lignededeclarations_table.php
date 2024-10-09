<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignededeclarationsTable extends Migration
{
    public function up()
    {
        Schema::create('lignededeclarations', function (Blueprint $table) {
            $table->id('idlignedeclarations');
            $table->enum('typedeclaration', ['type1', 'type2', 'type3']); // Example declaration types
            $table->longText('documents')->nullable(); // Made nullable if you don't always want to upload documents
            $table->date('datepiece');
            $table->string('libelle');
            $table->float('valeur1')->nullable();
            $table->float('valeur2')->nullable();
            $table->float('valeur3')->nullable();
            $table->float('valeur4')->nullable();
            $table->float('valeur5')->nullable();
            $table->float('valeur6')->nullable();
            $table->foreignId('declaration_id')->constrained('declarations')->onDelete('cascade'); // Updated foreign key name
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lignededeclarations');
    }
}
