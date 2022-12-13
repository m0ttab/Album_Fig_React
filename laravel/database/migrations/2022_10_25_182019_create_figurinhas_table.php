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
        Schema::create('figurinhas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('naturalidade');
            $table->date('dt_nascimento');
            $table->string('foto');
            $table->integer('numero');
            $table->integer('pos')->unique();
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
        Schema::dropIfExists('figurinhas');
    }
};
