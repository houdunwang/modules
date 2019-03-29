<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            table_site_relation($table);
            $table->string('title')->comment('视频标题');
            $table->text('path')->nullable()->comment('视频文件');
            $table->text('external_address')->nullable()->comment('外部播放地址');
            $table->text('question')->nullable()->comment('考题');
            $table->unsignedInteger('lesson_id')->index();
            $table->foreign('lesson_id')->references('id')->on('edu_lessons')->onDelete('cascade');
            $table->unsignedInteger('zan_num')->default(0);
            $table->unsignedSmallInteger('rank')->default(0)->comment('排序');
            $table->unsignedInteger('favorite_num')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edu_videos');
    }
}
