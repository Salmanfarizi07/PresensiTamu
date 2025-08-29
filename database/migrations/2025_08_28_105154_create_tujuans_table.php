<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tujuans', function (Blueprint $table) {
            $table->id();
            // kolom unit hanya punya opsi UPT / UP2B
            $table->enum('unit', ['UPT', 'UP2B']);
            $table->string('nama');
            $table->string('jabatan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tujuans');
    }
};
