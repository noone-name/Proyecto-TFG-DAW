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
        Schema::create('case_types', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->bigInteger('amount')->default('100');
            $table->string('case_category');
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
        Schema::dropIfExists('case_types');
    }
};
