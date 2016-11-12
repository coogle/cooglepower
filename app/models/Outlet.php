<?php

use CooglePower\WiringPi\WiringPi;
use Carbon\Carbon;
class Outlet extends \Eloquent
{
    protected $table = "outlets";
    protected $dates = ['created_at', 'updated_at'];
    protected $primaryKey = "outlet_id";
    
    public function toggle()
    {
        WiringPi::digitalToggle($this->outlet_id);
    }
    
    public function isOn()
    {
        $pin = WiringPi::WPI_TO_BCM[$this->outlet_id];
        return (bool)WiringPi::digitalRead($pin);
    }
    
    public function isOff()
    {
        $pin = WiringPi::WPI_TO_BCM[$this->outlet_id];
        return (bool)!WiringPi::digitalRead($pin);
    }
    
    public function turnOn()
    {
        $bcm = WiringPi::WPI_TO_BCM[$this->outlet_id];
        WiringPi::digitalWrite($bcm, 0);
    }
    
    public function turnOff()
    {
        $bcm = WiringPi::WPI_TO_BCM[$this->outlet_id];
        WiringPi::digitalWrite($bcm, 1);
    }
    
    public function scheduleText()
    {
        if(!$this->schedule_active) {
            return "Schedule Inactive";
        }
        
        if(empty($this->cron_schedule)) {
            return "Always On";
        }

    	switch($this->cron_schedule) {
    		case '@hourly':
    			return "Hourly";
    		case '@annually':
    		case '@yearly':
    			return "Annually";
    		case '@monthly':
    			return "Monthly";
    		case '@weekly':
    			return "Weekly";
    		case '@midnight':
    		case '@daily':
    			return "Daily";
    		default:
		        try {
        			$cronschedule = \CooglePower\Cron\CronSchedule::fromCronString($this->cron_schedule);
				    return $cronschedule->asNaturalLanguage();
        		} catch(\Exception $e) {
            			return "Invalid Schedule";
        		}
        }
        
        return "Unknown Schedule";
    }
    
    public function processCron()
    {
        if(empty($this->cron_schedule)) {
            \Log::info("[OUTLET] No Schedule, Always On");
            return;
        }

        $cron = \Cron\CronExpression::factory($this->cron_schedule);
        
        if($cron->isDue()) {
            $this->toggle();
            $status = $this->isOn() ? "ON" : "OFF";
            \Log::info("[OUTLET] Processing change for {$this->name}, Outlet is now $status");
        } else {
            \Log::info("[OUTLET] No action needed");
        }
        
    }
}
