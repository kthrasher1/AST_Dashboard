<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_user', function (Blueprint $table) {

            $table->bigIncrements('user_id');
            $table->unsignedBigInteger('staff_id');

            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
            $table->foreign('staff_id')->references('id')->on('staff')->onCascade('delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_user');
    }
}
