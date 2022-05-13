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
        Schema::create('case_invoces', function (Blueprint $table) {
            $table->id();
            $table->text('sub_total_amount');
            $table->unsignedBigInteger('normal_cases_id');      // caso


            $table->text('tax_amount')->default('21%');
            $table->text('total_amount');
            $table->enum('inv_status',array('Due','Partially Paid','Paid'))->default('Due');
            $table->date('due_date');
            $table->date('inv_date');


            $table->foreign('normal_cases_id')->references('id')->on('normal_cases_statuses');




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
        Schema::dropIfExists('case_invoces');
    }
};
