<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {

           $table->unsignedBigInteger('role_id');
           $table->unsignedBigInteger('user_id');

           //foreign keys
           $table->foreign('role_id')->references('id')->on('roles')->onCascade('delete');
           $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
