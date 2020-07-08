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
            $table->string('other_selector')->nullable();
            $table->boolean('module_issues_bool');
            $table->string('module_selector')->nullable();
            $table->boolean('module_expand_bool')->nullable();
            $table->string('module_detail')->nullable();
            $table->string('other_issues')->nullable();
            $table->integer('completed');
            $table->integer('risk_level');

            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('students')->onCascade('delete');

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
