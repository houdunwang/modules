<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAasTable extends Migration
{
    public function up()
    {
        Schema::create('blog_aas', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->string('aa',100)->comment('sdf');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_aas');
    }
}
