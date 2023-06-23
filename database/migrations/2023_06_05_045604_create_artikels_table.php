<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('sub_judul');
            $table->boolean('status_aktif')->default(false);
            $table->longText('isi_artikel')->nullable();
            $table->date('tanggal_dibuat');
            $table->string('dibaca')->nullable();
            $table->string('tag')->nullable();
            $table->foreignId('sub_kategori_id')->constrained('sub_kategoris');
            // $table->foreignId('opede_id')->constrained('opedes');
            // $table->foreignId('kategori_id')->constrained('kategoris');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikels');
    }
};
