<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable()->index()->comment('父级编号');
            table_site_relation($table);
            table_user_relation($table);
            $table->unsignedInteger('module_id')->comment('模块编号');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->text('comment_content')->comment('评论内容');
            $table->unsignedInteger('comment_id')->index();
            $table->string('comment_type')->index();
            $table->mediumInteger('favour_count')->default(0)->comment('点赞数');
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
        Schema::dropIfExists('comment_contents');
    }
}
