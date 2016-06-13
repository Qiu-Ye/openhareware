<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_params', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id');
            $table->string('name');
            $table->string('unit');
            $table->text('desc')->default('');
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
        Schema::table('receive_params', function (Blueprint $table) {
            //
        });
    }
}
