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
            $table->unsignedBigInteger('student_id')->unique();
            $table->integer('emotional_range')->nullable();
            $table->string('issue_selection')->nullable();
            $table->timestamps();
            $table->integer('page_number')->nullable();

            $table->foreign('student_id')->references('id')->on('users')->onCascade('delete');

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
