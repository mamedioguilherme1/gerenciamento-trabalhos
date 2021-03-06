<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('teacher_id')->unsigned()->nullable();
            $table->foreign('teacher_id')
              ->references('user_id')
              ->on('teachers')
            ->onDelete('cascade');

            $table->integer('discipline_id')->unsigned();
            $table->foreign('discipline_id')
              ->references('id')
              ->on('disciplines')
            ->onDelete('cascade');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
              ->references('id')
              ->on('courses')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
