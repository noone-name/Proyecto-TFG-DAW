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
        Schema::create('court_cases_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('court_cases_id');
            $table->foreign('court_cases_id')->references('id')->on('court_cases');

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
        Schema::dropIfExists('court_cases_statuses');
    }
};
