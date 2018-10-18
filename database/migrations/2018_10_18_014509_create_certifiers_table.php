<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCertifiersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certifiers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name')->nullable();
			$table->bigInteger('cid')->unique('index_certifiers_on_cid');
			$table->bigInteger('certifier_id')->nullable()->unique('index_certifiers_on_certifier_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('certifiers');
	}

}
