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
        Schema::create('dokumen_artikels', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('file');
            $table->string('keterangan');
            $table->foreignId('artikel_id')->constrained('artikels');
            // $table->foreignId('opede_id')->constrained('opedes');
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
        Schema::dropIfExists('dokumen_artikels');
    }
};
