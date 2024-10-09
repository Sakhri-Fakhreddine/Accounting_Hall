<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('idClients');
            $table->string('Nomprenom');
            $table->string('nom_commerciale');
            $table->string('adresse');
            $table->string('phone');
            $table->string('email')->unique();
            $table->foreignId('id_accountant')->constrained('accountants', 'idAccountant'); // Ensure correct table and column names
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
