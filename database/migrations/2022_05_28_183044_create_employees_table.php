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
            Schema::create('locations', function (Blueprint $table) {
                $table->id();
                $table->string('name')->uniqued();
                $table->timestamps();
            });
            
            Schema::create('positions', function (Blueprint $table) {
                $table->id();
                $table->string('name')->uniqued();
                $table->timestamps();
            });


        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Active', 'Egress', 'Joy'])->default('Active');

            $table->string('cod');          
            $table->string('dni')->unique();
            $table->string('first_lastname', 100)->nullable();
            $table->string('second_lastname', 100)->nullable();
            $table->date('birthday')->nullable();
        
            $table->enum('gender', ['Hombre', 'Mujer'])->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('position_id');           
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('departament_id');
            $table->date('date_of_admission');
           // 
            $table->date('date_of_egress')->nullable();

            $table->enum('digdoc', ['Yes', 'No'])->nullable();
            $table->date('date_of_digdoc')->nullable();
            $table->longText('observation')->nullable();
            $table->string('files')->nullable();            
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
             $table->foreign('company_id')->references('id')->on('branches');

            $table->foreign('departament_id')->references('id')->on('departaments');
            $table->foreign('position_id')->references('id')->on('positions');
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
        Schema::dropIfExists('locations');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('employees');
    }
};
