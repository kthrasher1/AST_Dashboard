<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id');
            $table->integer('emotion_slider');
            $table->string('issue_selector');
            $table->integer('risk_level');
            $table->integer('total_attendance');
            $table->integer('module_1_grade');
            $table->integer('module_1_attendance');
            $table->integer('module_2_grade');
            $table->integer('module_2_attendance');
            $table->integer('module_3_grade');
            $table->integer('module_3_attendance');
            $table->integer('module_4_grade');
            $table->integer('module_4_attendance');
            $table->integer('module_5_grade');
            $table->integer('module_5_attendance');
            $table->integer('module_6_grade');
            $table->integer('module_6_attendance');

            $table->timestamps();

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
        Schema::dropIfExists('student_data');
    }
}
