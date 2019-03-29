<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id')->comment('文档编号');
            $table->foreign('article_id')->references('id')->on('document_articles')->onDelete('cascade');
            $table->string('title')->comment('文档标题');
            $table->unsignedInteger('parent_id')->default(0);
            $table->mediumText('markdown')->nullable()->comment('文档内容');
            $table->mediumText('html')->nullable()->comment('文档内容');
            $table->unsignedInteger('favour_count')->default(0)->comment('点赞数');
            $table->unsignedInteger('rank')->default(0);
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
        Schema::dropIfExists('document_contents');
    }
}
