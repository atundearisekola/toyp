<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('favstarch')->nullable();
            $table->string('favperf')->nullable();
            $table->string('phone')->nullable();
            $table->string('addr')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('localgov')->nullable();
            $table->string('lat')->nullable();
            $table->string('longi')->nullable();
            $table->string('picurl')->nullable();
             $table->integer('role')->default(2);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
