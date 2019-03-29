<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopModulesTable extends Migration
{
    public function up()
    {
        Schema::create('shop_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('模块名称');
            $table->string('name')->unique()->comment('模块标识');
            $table->tinyInteger('local')->nullable()->comment('系统内容模块');
            $table->string('version')->comment('版本号');
            $table->string('status')->nullable()->comment('审核状态');
            $table->string('thumb', 1000)->nullable()->comment('预览图片');
            $table->text('logs')->nullable()->comment('更新日志');
            $table->unsignedInteger('user_id')->index()->comment('用户编号');
            $table->text('package')->comment('配置项');
            $table->string('description')->nullable()->comment('模块介绍');
            $table->text('content')->nullable()->comment('模块介绍');
            $table->decimal('price')->nullable()->comment('售价');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_modules');
    }
}
