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
        Schema::create('figurinhas_pacotes', function (Blueprint $table) {
            $table->id();
            $table->date('dt_adicionada');

            $table->unsignedBigInteger("id_figurinha");
            $table->unsignedBigInteger("id_pacote");

            $table->foreign('id_figurinha')->references('id')->on('figurinhas')->onDelete('cascade');
            $table->foreign('id_pacote')->references('id')->on('pacotes')->onDelete('cascade');
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
        Schema::dropIfExists('figurinhas_pacotes');
    }
};
