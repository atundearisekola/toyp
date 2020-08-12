<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
             $table->string('nominator');
            $table->string('nominee');
            $table->text('picurl')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nemail');
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('occupation')->nullable();
            $table->string('cat')->nullable();
            $table->string('bio')->nullable();
             $table->integer('votes');
            $table->string('status')->default('inactive');
            $table->string('honor')->default('no');

            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominees');
    }
}
