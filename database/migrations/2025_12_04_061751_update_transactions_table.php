<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {

            // rename kolom yang benar-benar ada
            $table->renameColumn('nama_pemesan', 'nama_pembeli');
            $table->renameColumn('telepon', 'no_hp');
            $table->renameColumn('email', 'alamat');
            $table->renameColumn('kategori_properti', 'id_categories');
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {

            // rollback
            $table->renameColumn('nama_pembeli', 'nama_pemesan');
            $table->renameColumn('no_hp', 'telepon');
            $table->renameColumn('alamat', 'email');
            $table->renameColumn('id_categories', 'kategori_properti');
        });
    }
};
