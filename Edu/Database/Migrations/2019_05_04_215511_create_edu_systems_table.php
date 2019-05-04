<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSystemsTable extends Migration
{
    public function up()
    {
        Schema::create('edu_systems', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->string('title', 100)->comment('标题');
            $table->string('introduce', 200)->comment('课程介绍');
            $table->string('lessons', 100)->comment('课程编号');
            $table->string('thumb', 1000)->comment('预览图片');
            table_user_relation($table);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('edu_systems');
    }
}
