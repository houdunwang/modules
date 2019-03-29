<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_exams', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            table_user_relation($table);
            $table->unsignedInteger('lesson_id');
            $table->unsignedInteger('video_id');
            $table->foreign('video_id')->references('id')->on('edu_videos')->onDelete('cascade');
            $table->tinyInteger('grade')->comment('成绩');
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
        Schema::dropIfExists('edu_exams');
    }
}
