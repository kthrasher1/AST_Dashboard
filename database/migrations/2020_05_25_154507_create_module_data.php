<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id');

            $table->integer('semester');

            $table->string('module_1_name');
            $table->integer('module_1_grade');
            $table->integer('module_1_attendance_weekly');
            $table->integer('module_1_semester');

            $table->string('module_2_name');
            $table->integer('module_2_grade');
            $table->integer('module_2_attendance_weekly');
            $table->integer('module_2_semester');

            $table->string('module_3_name');
            $table->integer('module_3_grade');
            $table->integer('module_3_attendance_weekly');
            $table->integer('module_3_semester');

            $table->integer('total_grade_semester_1')->nullable();
            $table->integer('weekly_attendance_semester_1')->nullable();
            $table->integer('total_attendance_semester_1')->nullable();

            $table->string('module_4_name')->nullable();
            $table->integer('module_4_grade')->nullable();
            $table->integer('module_4_attendance_weekly')->nullable();
            $table->integer('module_4_semester');

            $table->string('module_5_name')->nullable();
            $table->integer('module_5_grade')->nullable();
            $table->integer('module_5_attendance_weekly')->nullable();
            $table->integer('module_5_semester');

            $table->string('module_6_name')->nullable();
            $table->integer('module_6_grade')->nullable();
            $table->integer('module_6_attendance_weekly')->nullable();
            $table->integer('module_6_semester');

            $table->integer('total_grade_semester_2')->nullable();
            $table->integer('weekly_attendance_semester_2')->nullable();
            $table->integer('total_attendance_semester_2')->nullable();

            $table->foreign('student_id')->references('student_id')->on('students')->onCascade('delete');
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
        Schema::dropIfExists('_module__data');
    }
}
