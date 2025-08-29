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
        Schema::table('submissions', function (Blueprint $table) {
            $table->string('id_kartu', 10)->nullable()->after('daerah'); // sama dengan zones.id_kartu
            $table->index('id_kartu'); // optional supaya search cepat
        });
    }

    public function down()
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropColumn('id_kartu');
        });
    }

};
