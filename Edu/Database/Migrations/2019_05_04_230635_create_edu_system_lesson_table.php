<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSystemLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_system_lesson', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lesson_id')->comment('课程编号');
            $table->foreign('lesson_id')->references('id')->on('edu_lessons')->onDelete('cascade');
            $table->unsignedInteger('system_id')->comment('系统课程编号');
            $table->foreign('system_id')->references('id')->on('edu_systems')->onDelete('cascade');
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
        Schema::dropIfExists('edu_system_lesson');
    }
}
