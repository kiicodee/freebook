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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('namaBuku');
            $table->integer('penulisId');
            $table->integer('kategoriId');
            $table->text('deskripsi');
            $table->string('sampul');
            $table->string('ebook');
            $table->enum('status', ['waiting_approval', 'publish', 'unpublish'])->default('waiting_approval');
            $table->date('tanggal_publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
