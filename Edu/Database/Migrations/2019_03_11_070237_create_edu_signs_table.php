<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_signs', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->unsignedInteger('user_id')->index()->comment('会员');
            $table->string('content')->comment('我今天最想说');
            $table->string('mood')->comment('心情图标');
            $table->unsignedInteger('favour_count')->default(0)->comment('点赞数');
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
        Schema::dropIfExists('edu_signs');
    }
}
