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
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->string('court_name');
            $table->string('court_address');
            $table->unsignedBigInteger('case_types_id');

            $table->foreign('case_types_id')->references('id')->on('case_types'); // cliente

            $table->enum('is_active',array('Yes','No'))->default('Yes');
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
        Schema::dropIfExists('courts');
    }
};
