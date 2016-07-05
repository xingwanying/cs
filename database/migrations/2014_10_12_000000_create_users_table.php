<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',60)->unique();
            $table->string('mobile',20)->unique()->nullable();
            $table->string('password', 60);
            $table->string('gender',1);
            $table->string('avatar_img_url',255)->nullable();
            $table->tinyInteger('status')->unsigned();
            $table->tinyInteger('role')->unsigned();
            $table->timestamp('deleted_at')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
