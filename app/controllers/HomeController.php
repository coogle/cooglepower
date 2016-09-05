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
	    
	    for($i = 0; $i < 16; $i++) {
	        $outlets[] = [
	            'gpio' => $i,
	            'text' => 'Outlet #' . ($i +1),
	            'checked' => (bool) WiringPi::digitalRead(WiringPi::WPI_TO_BCM[$i])
	        ];
	    }
	    
	    return \View::make('layout', compact('outlets'));
	}

}
