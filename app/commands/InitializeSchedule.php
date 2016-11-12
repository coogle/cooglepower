<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Carbon\Carbon;

class InitializeSchedule extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cooglepower:init-schedule';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Initialize the schedule (set outlet states)';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$outlets = Outlet::all();
        $now = Carbon::now();
        
		foreach($outlets as $outlet) {
		    
		    if(!$outlet->schedule_active) {
		        $this->info("[Outlet {$outlet->outlet_id} - {$outlet->name}] ON - Schedule Inactive");
		        continue;
		    }
		    
		    if(empty($outlet->cron_schedule)) {
		        if(!$outlet->initial_state) {
		            $this->info("[Outlet {$outlet->outlet_id} - {$outlet->name}] OFF - Default State Inactive");
		            $outlet->toggle();
		            continue;
		        } else {
		            $this->info("[Outlet {$outlet->outlet_id} - {$outlet->name}] ON - Default State Active");
		            continue;
		        }
		    }
		    
		    $parts = preg_split('/\s+/', $outlet->cron_schedule);
		    
		    // We default to outlets being ON, so if the initial state is off we need to toggle
		    $shouldToggle = !$outlet->initial_state;
		    
		    foreach($parts as $segment => $sched_part) {
		        
		        if(strpos($sched_part, ',') === false) {
		            continue;
		        }
		        
		        list($onAt, $offAt) = explode(',', $sched_part);
		        
		        switch($segment) {
		            case 0: // min
		                break;
		            case 1: // hour
		                if($outlet->initial_state) { // initial state is on
		                    
		                    // We are in a range of time that it should be OFF
		                    if(($now->hour >= $onAt) && ($now->hour < $offAt)) {
		                        $shouldToggle = true;
		                    }
		                } else { // initial state is OFF
		                    
		                    $shouldToggle = true;
		                    
		                    if(($now->hour >= $onAt) && ($now->hour < $offAt)) {
		                        $shouldToggle = false;
		                    }
		                }
		                break;
		            case 2: // day of month;
		                break;
		            case 3: // month
		                break;
		            case 4: // day of week
		                break;
		        }
		        
		    }
		    
		    if($shouldToggle) {
		        $this->info("[Outlet {$outlet->outlet_id} - {$outlet->name}] - OFF Per outlet schedule");
		        $outlet->toggle();
		    } else {
		        $this->info("[Outlet {$outlet->outlet_id} - {$outlet->name}] - ON Per outlet schedule");
		    }
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
		);
	}

}
