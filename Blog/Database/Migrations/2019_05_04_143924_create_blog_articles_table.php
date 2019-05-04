<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->string('title',100)->comment('标题');
$table->string('content',1000)->comment('内容');
$table->string('thumb',1000)->nullable()->comment('缩略图');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_articles');
    }
}
