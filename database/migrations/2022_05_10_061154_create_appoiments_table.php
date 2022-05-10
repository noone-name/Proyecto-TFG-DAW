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
        Schema::create('appoiments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_cliente');
            $table->unsignedBigInteger('user_id_abogado');

            $table->foreign('user_id_cliente')->references('id')->on('users'); // cliente
            $table->foreign('user_id_abogado')->references('id')->on('users');

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
        Schema::dropIfExists('appoiments');
    }
};
