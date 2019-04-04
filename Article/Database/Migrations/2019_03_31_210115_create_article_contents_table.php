<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->comment('文章标题');
            $table->text('content')->nullable()->comment('正文');
            $table->string('source', 50)->nullable()->comment('来源');
            $table->string('author', 50)->nullable()->comment('作者');
            $table->string('thumb', 1000)->nullable()->comment('预览图片');
            $table->string('description')->nullable()->comment('简介');
            table_user_relation($table);
            table_site_relation($table);
            $table->unsignedInteger('category_id')->comment('栏目编号');
            $table->foreign('category_id')->references('id')->on('article_categories')->onDelete('cascade');
            $table->mediumText('fields')->nullable()->comment('附加字段');
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
        Schema::dropIfExists('article_contents');
    }
}
