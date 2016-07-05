<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unsigned()->nullable();
            $table->string('title');
            $table->string('html_url',255)->nullable();
            $table->integer('comment_count')->unsigned()->nullable()->default(0);
            $table->integer('favorite_count')->unsigned()->nullable()->default(0);
            $table->string('cover_img_url',255)->nullable();
            $table->tinyInteger('type')->unsigned();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('op_uid')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('informations');
    }
}
