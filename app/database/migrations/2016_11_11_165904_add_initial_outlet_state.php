<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInitialOutletState extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('outlets', function(Blueprint $table) {
		    $table->boolean('initial_state')->default(false); 
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('outlets', function(Blueprint $table) {
		    $table->dropColumn('initial_state');
		});
	}

}
