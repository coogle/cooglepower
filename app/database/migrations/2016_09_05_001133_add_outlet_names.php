<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOutletNames extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outlets', function(Blueprint $table) {
		    $table->integer('outlet_id')->unsigned();
		    $table->string('name');
		    $table->string('cron_schedule')->default('');
		    $table->timestamps();
		    
		    $table->primary('outlet_id');
		});
		
		for($i = 0; $i <= 16; $i++) 
		{
		    if($i == 15) {
		        continue;
		    }
		    
		    $outlet = new Outlet();
		    $outlet->outlet_id = $i;
		    
		    if($i != 16) {
		       $outlet->name = "Outlet #" . ($i+1);
		    } else {
		        $outlet->name = "Outlet #16";
		    }
		    
		    $outlet->save();
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
