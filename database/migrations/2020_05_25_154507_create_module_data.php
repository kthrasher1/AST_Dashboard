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

            $table->integer('total_attendance');
            // $table->integer('total_grade');

            $table->string('module_1_name');
            $table->integer('module_1_grade');
            $table->integer('module_1_attendance');
            $table->integer('module_1_semester');

            $table->string('module_2_name');
            $table->integer('module_2_grade');
            $table->integer('module_2_attendance');
            $table->integer('module_2_semester');

            $table->string('module_3_name');
            $table->integer('module_3_grade');
            $table->integer('module_3_attendance');
            $table->integer('module_3_semester');

            $table->string('module_4_name')->nullable();
            $table->integer('module_4_grade')->nullable();
            $table->integer('module_4_attendance')->nullable();
            $table->integer('module_4_semester');

            $table->string('module_5_name')->nullable();
            $table->integer('module_5_grade')->nullable();
            $table->integer('module_5_attendance')->nullable();
            $table->integer('module_5_semester');

            $table->string('module_6_name')->nullable();
            $table->integer('module_6_grade')->nullable();
            $table->integer('module_6_attendance')->nullable();
            $table->integer('module_6_semester');

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
