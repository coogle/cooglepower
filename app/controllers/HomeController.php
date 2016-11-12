<?php

use \CooglePower\WiringPi\WiringPi;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    
	public function index()
	{
	    $outlets = [];
	    
	    $outletObjs = Outlet::all();
	    
	    foreach($outletObjs as $outlet) {
	        
	        $outlets[] = [
	            'gpio' => $outlet->outlet_id,
	            'text' => $outlet->name,
	            'checked' => $outlet->isOn(),
	            'schedule' => $outlet->scheduleText(),
	            'active' => (bool)$outlet->schedule_active
	        ];
	    }
	    
	    return \View::make('layout', compact('outlets'));
	}

}
