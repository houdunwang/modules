<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduLessonBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_lesson_buys', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            table_user_relation($table);
            $table->unsignedInteger('lesson_id')->index()->comment('课程编号');
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
        Schema::dropIfExists('edu_lesson_buys');
    }
}
