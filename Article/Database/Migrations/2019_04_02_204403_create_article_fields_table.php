<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('article_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('字段名');
            $table->string('name')->comment('表单name');
            $table->string('placeholder', 500)->nullable()->comment('表单注释');
            $table->string('field', 2000)->nullable()->comment('表单选项');
            $table->string('rule', 2000)->nullable()->comment('验证规则');
            table_site_relation($table);
            $table->unsignedInteger('model_id')->comment('模型编号');
            $table->foreign('model_id')->references('id')->on('article_models')->onDelete('cascade');
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
        Schema::dropIfExists('article_fields');
    }
}
