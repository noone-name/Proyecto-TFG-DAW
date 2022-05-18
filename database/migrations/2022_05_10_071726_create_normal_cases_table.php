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
        Schema::create('normal_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_title');
            $table->unsignedBigInteger('user_id_cliente');
            $table->unsignedBigInteger('user_id_abogado');
            $table->unsignedBigInteger('case_types_id');
            $table->enum('client_position',array('Respondent','Petitioner'));
            $table->text('description')->nullable()->default('text');
            $table->string('case_document');
            $table->enum('status',array('Pending','Active','Cancelled','Rejected','Completed'))->default('Pending');
            $table->boolean('is_active')->nullable()->default(true);

            $table->foreign('case_types_id')->references('id')->on('case_types')->onDelete('cascade');

            $table->foreign('user_id_cliente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id_abogado')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('normal_cases');
    }
};
