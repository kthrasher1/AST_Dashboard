<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_student', function (Blueprint $table) {

            $table->unsignedBigInteger('staff_id');
            $table->bigIncrements('student_id');

            $table->foreign('staff_id')->references('id')->on('staff')->onCascade('delete');
            $table->foreign('student_id')->references('id')->on('students')->onCascade('delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_student');
    }
}
