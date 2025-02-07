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
        Schema::table('bantuans', function (Blueprint $table) {
            $table->string('sumber')->nullable()->after('nilai'); // Menambahkan kolom sumber
            $table->string('kode_wilayah')->nullable()->after('sumber'); // Menambahkan kolom kode_wilayah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bantuans', function (Blueprint $table) {
            $table->dropColumn(['sumber', 'kode_wilayah']);
        });
    }
};
