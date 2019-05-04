<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCcsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_ccs', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->string('title',100)->comment('标题');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_ccs');
    }
}
