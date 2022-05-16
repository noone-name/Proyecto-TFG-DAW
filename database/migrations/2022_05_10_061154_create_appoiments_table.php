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
            $table->string('title_appoiment');
            $table->unsignedBigInteger('user_id_solicitante');
            $table->unsignedBigInteger('user_id_solicitado');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('checkbox_time')->nullable()->default(false);
            $table->text('description');
            $table->enum('status',array('Pending','Active','Cancelled','Rejected','PendingTo'))->default('Pending');
            $table->boolean('is_active')->nullable()->default(true);



            $table->foreign('user_id_solicitante')->references('id')->on('users')->onDelete('cascade'); // cliente
            $table->foreign('user_id_solicitado')->references('id')->on('users')->onDelete('cascade');

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
