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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alamat')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('keluar')->nullable();
            $table->string('keperluan')->nullable();
            $table->string('tujuan_id')->nullable();
            $table->string('identitas')->nullable();
            $table->string('daerah')->nullable();
            $table->string('nokartu')->nullable();
            $table->string('nopol')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
