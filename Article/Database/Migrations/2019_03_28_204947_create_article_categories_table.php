<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->string('title')->comment('栏目名称');
            $table->string('description', 500)->nullable()->comment('栏目摘要');
            $table->string('tpl_index')->comment('封面模板');
            $table->string('tpl_list')->comment('列表模板');
            $table->string('tpl_content')->comment('内容页模板');
            $table->unsignedInteger('model_id')->comment('关联模型');
            $table->unsignedInteger('parent_id')->default(0)->comment('父级栏目');
            $table->string('url')->nullable()->comment('外部链接');
            $table->string('preview', 1000)->nullable()->comment('缩略图');
            $table->text('content')->nullable()->comment('单页面');
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
        Schema::dropIfExists('article_categories');
    }
}
