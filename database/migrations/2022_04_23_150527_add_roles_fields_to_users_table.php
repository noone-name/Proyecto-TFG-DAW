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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained();
            
            
            $table->string('client_dni')->nullable();
            $table->date('client_birth_date')->nullable();
            $table->string('client_declarated_address')->nullable();
            $table->string('client_home_address')->nullable();
            $table->string('client_mobile_phone')->nullable();
            $table->string('client_gender')->nullable();

            $table->string('lawyer_dni')->nullable();
            $table->string('lawyer_mobile_phone')->nullable();
            $table->string('lawyer_licence_number')->nullable();
            $table->string('lawyer_specialty')->nullable();
            $table->string('lawyer_office_name')->nullable();
            $table->text('lawyer_biography')->nullable();
            $table->string('lawyer_work_days')->nullable();
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
