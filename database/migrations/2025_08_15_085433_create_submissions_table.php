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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alamat');
            $table->string('jumlah');
            $table->string('keluar', 5)->nullable();
            $table->string('keperluan');
            $table->string('identitas');
            $table->string('daerah');
            $table->string('nokartu');
            $table->string('nopol');
            $table->timestamps();
            
            $table->enum('status', ['pending', 'aktif', 'nonaktif'])->default('pending');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
