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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
                      $table->string('dni')->unique();
                      $table->string('first_lastname', 100);
                      $table->string('second_lastname', 100)->nullable();
                $table->date('birthday');
                $table->char('gender',1)->nullable();
                $table->string('phone')->nullable();
                $table->string('cell_phone')->nullable();
            
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('departament_id');
            $table->date('date_of_admission');
           // $table->enum('status', ['Active', 'Egress', 'Jubilado'])->default('Active');
            $table->date('date_of_egress')->nullable();
            //$table->longText('observation')->nullable();
            $table->string('files')->nullable();
         //   $table->unsignedBigInteger('location_id');
          //  $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('company_id')->references('id')->on('branches');
            $table->foreign('departament_id')->references('id')->on('departaments');
          
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
        Schema::dropIfExists('employees');
    }
};
