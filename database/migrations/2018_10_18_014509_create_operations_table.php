<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOperationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('certifier_name')->nullable();
			$table->text('certifier_website')->nullable();
			$table->text('certifier_email')->nullable();
			$table->text('operation_id');
			$table->text('operation_name')->nullable();
			$table->text('other_operation_names')->nullable();
			$table->text('client_id')->nullable();
			$table->text('contact_first_name')->nullable();
			$table->text('contact_last_name')->nullable();
			$table->text('certification_status')->nullable();
			$table->text('certification_status_effective_on', 65535)->nullable();
			$table->text('op_nopAnniversaryDate', 65535)->nullable();
			$table->text('crops_certification_status')->nullable();
			$table->text('crops_status_effective_on', 65535)->nullable();
			$table->text('crops_products')->nullable();
			$table->text('crops_additional_products')->nullable();
			$table->text('crops_certificate_number')->nullable();
			$table->text('livestock_certification_status')->nullable();
			$table->text('livestock_status_effective_on', 65535)->nullable();
			$table->text('livestock_products')->nullable();
			$table->text('livestock_additional_products')->nullable();
			$table->text('livestock_certificate_number')->nullable();
			$table->text('wild_crops_certification_status')->nullable();
			$table->text('wild_crops_status_effective_on', 65535)->nullable();
			$table->text('wild_crops_products')->nullable();
			$table->text('wild_crops_additional_products')->nullable();
			$table->text('wild_crops_certificate_number')->nullable();
			$table->text('handling_certification_status')->nullable();
			$table->text('handling_status_effective_on', 65535)->nullable();
			$table->text('handling_products')->nullable();
			$table->text('handling_additional_products')->nullable();
			$table->text('handling_certificate_number')->nullable();
			$table->text('physical_address')->nullable();
			$table->text('physical_address2')->nullable();
			$table->text('physical_city')->nullable();
			$table->text('physical_state')->nullable();
			$table->text('physical_country')->nullable();
			$table->text('physical_zip')->nullable();
			$table->text('mailing_address')->nullable();
			$table->text('mailing_address2')->nullable();
			$table->text('mailing_city')->nullable();
			$table->text('mailing_state')->nullable();
			$table->text('mailing_country')->nullable();
			$table->text('mailing_zip')->nullable();
			$table->text('phone')->nullable();
			$table->text('email')->nullable();
			$table->text('website')->nullable();
			$table->text('additional_information')->nullable();
			$table->char('broker', 50)->nullable();
			$table->char('csa', 50)->nullable();
			$table->char('co_packer', 50)->nullable();
			$table->char('dairy', 50)->nullable();
			$table->char('distrbutor', 50)->nullable();
			$table->char('marketer', 50)->nullable();
			$table->char('restaurant', 50)->nullable();
			$table->char('retail', 50)->nullable();
			$table->char('poultry', 50)->nullable();
			$table->char('private_labeler', 50)->nullable();
			$table->char('slaughter_house', 50)->nullable();
			$table->char('storage', 50)->nullable();
			$table->char('grower_group', 50)->nullable();
			$table->text('date_as_of', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operations');
	}

}
