<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduUserVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_user_videos', function (Blueprint $table) {
            $table->increments('id');
            table_user_relation($table);
            table_site_relation($table);
            $table->unsignedInteger('lesson_id')->index();
            $table->unsignedInteger('video_id')->index();
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
        Schema::dropIfExists('edu_user_videos');
    }
}
