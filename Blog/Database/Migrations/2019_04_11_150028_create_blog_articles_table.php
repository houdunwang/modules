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
            $table->string('title')->comment('标题');
$table->text('content')->comment('内容');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_articles');
    }
}
