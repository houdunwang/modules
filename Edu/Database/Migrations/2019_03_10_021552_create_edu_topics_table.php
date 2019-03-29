<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_topics', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->string('title');
            $table->mediumText('content');
            $table->unsignedInteger('favour_num')->default(0)->comment('点赞数');
            $table->unsignedInteger('favorite_num')->default(0)->comment('收藏数');
            $table->unsignedInteger('comment_num')->default(0)->comment('评论数');
            $table->tinyInteger('recommend')->default(0)->comment('推荐');
            table_user_relation($table);
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
        Schema::dropIfExists('edu_topics');
    }
}
