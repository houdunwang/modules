<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduSignTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_sign_totals', function (Blueprint $table) {
            $table->increments('id');
            table_site_relation($table);
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('total')->comment('总天数');
            $table->unsignedInteger('month')->comment('月天数');
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
        Schema::dropIfExists('edu_sign_totals');
    }
}
