<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnlyDownFieldToLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edu_lessons', function (Blueprint $table) {
$table->tinyInteger('only_down')->nullable()->comment('只允许下载，不允许在线观看');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesson', function (Blueprint $table) {

        });
    }
}
