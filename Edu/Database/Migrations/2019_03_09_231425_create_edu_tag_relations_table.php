<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduTagRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_tag_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('edu_tag_id');
            $table->unsignedInteger('tag_relation_id')->index();
            $table->string('tag_relation_type')->index();
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
        Schema::dropIfExists('edu_tag_relations');
    }
}
