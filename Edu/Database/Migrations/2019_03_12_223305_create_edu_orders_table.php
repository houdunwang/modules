<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_orders', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            table_user_relation($table);
            $table->decimal('price')->comment('售价');
            $table->string('subject')->comment('商品名称');
            $table->string('sn')->unique()->comment('定单号');
            $table->char('type')->comment('subscribe:订阅,lesson:课程');
            $table->unsignedTinyInteger('month')->nullable()->comment('订阅月数');
            $table->unsignedInteger('lesson_id')->nullable()->comment('课程编号');
            $table->tinyInteger('status')->default(0)->comment('支付状态');
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
        Schema::dropIfExists('edu_orders');
    }
}
