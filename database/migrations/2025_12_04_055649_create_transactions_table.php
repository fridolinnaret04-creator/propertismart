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
        Schema::create('transactions', function (Blueprint $table) {
        $table->id('id_transaction');
        $table->string('nama_pemesan', 100);
        $table->string('telepon', 20);
        $table->string('email', 100);
        $table->string('kategori_properti', 100);
        $table->integer('harga');
        $table->date('tanggal');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
