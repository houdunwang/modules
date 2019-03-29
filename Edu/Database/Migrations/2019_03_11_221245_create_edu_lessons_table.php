<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_lessons', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->timestamps();
            $table->string('title');
            $table->string('description')->nullable()->comment('课程介绍');
            $table->string('thumb')->nullable()->comment('预览图片');
            $table->char('type', 20)->default('video')->index()->comment('类型:system系统，video播客');
            $table->tinyInteger('status')->default(1)->comment('1:上架 0:下架');
            $table->unsignedTinyInteger('free')->default(0)->index()->comment('1:免费课 0:收费');
            $table->unsignedTinyInteger('subscribe_free_play')->default(1)->index()->comment('定阅用户免费观看');
            $table->tinyInteger('free_num')->default(0)->index()->comment('免费观看数量');
            $table->decimal('price')->nullable()->comment('售价');
            $table->tinyInteger('is_commend')->nullable()->index()->comment('推荐');
            $table->string('video_num')->default(0)->comment('视频数量');
            $table->string('download_address')->nullable()->comment('下载地址');
            $table->unsignedInteger('user_id');
            $table->mediumInteger('read_num')->default(0)->comment('查看次数');
            $table->unsignedInteger('zan_num')->default(0);
            $table->unsignedInteger('favorite_num')->default(0);
            $table->unsignedInteger('comment_num')->default(0)->comment('评论数');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edu_lessons');
    }
}
