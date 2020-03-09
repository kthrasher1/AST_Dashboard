<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
          
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('student_id');
 
            //foreign keys
            $table->foreign('staff_id')->references('id')->on('users')->onCascade('delete');
            $table->foreign('student_id')->references('student_id')->on('student_data')->onCascade('delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
