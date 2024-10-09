<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclarationsTable extends Migration
{
    public function up()
    {
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            
            // Use 'client_id' and reference the 'idClients' in 'clients' table
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('idClients')->on('clients')->onDelete('cascade');

            $table->string('declaration_type');
            $table->date('declaration_date');
            $table->text('details')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('declarations');
    }
}
