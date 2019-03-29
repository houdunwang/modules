<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_subscribes', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->string('title')->comment('标题');
            $table->string('ad')->comment('广告语');
            $table->string('icon')->comment('图标');
            $table->tinyInteger('month')->comment('添加月数');
            $table->decimal('price')->comment('售价');
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
        Schema::dropIfExists('edu_subscribes');
    }
}
