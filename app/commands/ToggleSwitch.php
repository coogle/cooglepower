<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use \CooglePower\WiringPi\WiringPi;

class ToggleSwitch extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cooglepower:toggle';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Toggles a Given Switch By WiringPi ID #';

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
		$gpio = $this->argument('gpio');
		
		$status = \CooglePower\WiringPi\WiringPi::digitalToggle($gpio) ? "ON" :"OFF"; 
		
		$this->info("GPIO #$gpio is now $status");
		
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('gpio', InputArgument::REQUIRED, 'The Switch ID (0-15)'),
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
