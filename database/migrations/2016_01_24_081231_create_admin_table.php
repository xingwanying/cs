<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTable extends Migration {

	public function up()
	{
		Schema::create('admin', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 10);
			$table->string('sex',1);
			$table->string('belong_unit', 10);
			$table->string('email', 15);
			$table->string('mobile', 15);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('admin');
	}
}