<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('bukus', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('penulis');
        $table->string('genre');
        $table->year('tahun_terbit');
        $table->integer('stok');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
