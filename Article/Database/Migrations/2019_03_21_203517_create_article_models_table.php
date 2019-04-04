<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('模型名称');
            table_site_relation($table);
            $table->unsignedTinyInteger('is_system')->default(0)->comment('系统模型');
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
        Schema::dropIfExists('article_models');
    }
}
