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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('buku_id')->constrained('bukus')->onDelete('cascade');
            $table->foreignUuid('anggota_id')->constrained('anggotas')->onDelete('cascade');
            $table->foreignUuid('pengurus_id')->constrained('penguruses')->onDelete('cascade');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status',['Pending','diPinjam','diKembalikan','Telat'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
