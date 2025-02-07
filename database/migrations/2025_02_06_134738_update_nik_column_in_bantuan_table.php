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
            // Mengubah kolom nik menjadi tipe string(16) dan memastikan tidak ada unique constraint
            $table->string('nik', 16)->change();  // Menjadikan nik 16 digit
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bantuans', function (Blueprint $table) {
            $table->string('nik')->change();  // Kembalikan jika perlu
        });
    }
};
