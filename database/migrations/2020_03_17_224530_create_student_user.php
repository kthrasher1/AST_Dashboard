<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_user', function (Blueprint $table) {

            $table->bigIncrements('user_id');
            $table->unsignedBigInteger('student_id');

            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
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
        Schema::dropIfExists('student_user');
    }
}
