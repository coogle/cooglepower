<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

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
		
		foreach($outlets as $outlet) {
		    if(!empty($outlet->cron_schedule)) {
		        $this->info("Setting outlet {$outlet->outlet_id} to Off");
		        $outlet->toggle();
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
