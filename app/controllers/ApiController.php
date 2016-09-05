<?php

use \CooglePower\WiringPi\WiringPi;

class ApiController extends \BaseController
{

    
    protected function getGpioStates()
    {
        $states = [];
        
        $convert = WiringPi::WPI_TO_BCM;
        
        foreach ($convert as $wpi => $bcm)
        {
            $states[$wpi] = (bool) WiringPi::digitalRead($bcm);            
        }
        
        return $states;
    }
    
    public function gpioStates()
    {
        $retval = [
            'success' => false,
            'states' => []
        ];
        
        for($i = 0; $i < 16; $i++) {
            $retval['states'] = $this->getGpioStates();
        }
        
        $retval['success'] = true;
        
        return \Response::json($retval);
    }
    
    public function gpioOn($gpio)
    {
        $retval = [
            'success' => false,
            'states' => []
        ];
        
        if(($gpio < 0) || ($gpio > 15)) {
            return \Response::json($retval);
        }
        
        $bcm = WiringPi::WPI_TO_BCM[$gpio];
        
        WiringPi::digitalWrite($bcm, 1);
        
        $retval['success'] = true;
        $retval['states'] = $this->getGpioStates();
        
        return \Response::json($retval);
    }
    
    public function gpioOff($gpio)
    {
        $retval = [
            'success' => false,
            'states' => []
        ];
        
        if(($gpio < 0) || ($gpio > 15)) {
            return \Response::json($retval);
        }
        
        $bcm = WiringPi::WPI_TO_BCM[$gpio];
        
        WiringPi::digitalWrite($bcm, 0);
        
        $retval['success'] = true;
        $retval['states'] = $this->getGpioStates();
        
        return \Response::json($retval);
    }
}