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
        Schema::create('normal_cases_statuses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('normal_cases_id');


            $table->text('cancel_answer')->nullable();
            $table->text('lawyer_docs_requirements')->nullable();
            $table->text('potential_resolution')->nullable();
            $table->text('extra_info')->nullable();
            $table->enum('is_active',array('Active','Cancelled','Rejected'))->default('Active');


            $table->foreign('normal_cases_id')->references('id')->on('normal_cases')->onDelete('cascade');



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
        Schema::dropIfExists('normal_cases_statuses');
    }
};
