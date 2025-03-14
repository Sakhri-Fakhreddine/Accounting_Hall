<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::table('accountants', function (Blueprint $table) {
                $table->enum('etat', ['active', 'inactive'])->default('inactive');
            });
        }

        public function down()
        {
            Schema::table('accountants', function (Blueprint $table) {
                $table->dropColumn('etat');
            });
        }

};
