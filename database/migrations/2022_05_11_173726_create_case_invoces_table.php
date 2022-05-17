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
            $table->unsignedBigInteger('normal_cases_id');


            $table->float('total_amount');
            $table->float('tax_amount');
            $table->float('amount_paid')->default(0);
            $table->float('amount_slope')->default(0);



            $table->enum('inv_status',array('Due','Partially Paid','Paid'))->default('Due');

            $table->foreign('normal_cases_id')->references('id')->on('normal_cases')->onDelete('cascade');



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
