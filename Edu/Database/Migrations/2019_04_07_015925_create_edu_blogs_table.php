<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_blogs', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            table_user_relation($table);
            $table->string('title', 100)->comment('标题');
            $table->unsignedInteger('comment_num')->nullable();
            $table->string('path', 1000)->comment('播客地址');
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
        Schema::dropIfExists('edu_blogs');
    }
}
