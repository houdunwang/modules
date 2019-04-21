<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduAdsTable extends Migration
{
    public function up()
    {
        Schema::create('edu_ads', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->string('title')->comment('标题');
$table->string('url')->comment('跳转链接');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('edu_ads');
    }
}
