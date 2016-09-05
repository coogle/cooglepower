<?php

namespace CooglePower\WiringPi;

class WiringPi
{
    const WPI_TO_BCM = [
        8 => 2,
        9 => 3,
        7 => 4,
        0 => 17,
        2 => 27,
        3 => 22,
        12 => 10,
        13 => 9,
        14 => 11,
        17 => 28,
        19 => 30,
        15 => 14,
        16 => 15,
        1 => 18,
        4 => 23,
        5 => 24,
        6 => 25,
        10 => 8,
        11 => 7,
        18 => 29,
        20 => 31
    ];
    
    static protected $isSetup = false;
    
    static public function digitalToggle($gpio) {
        $pin = self::WPI_TO_BCM[$gpio];
        $currentStatus = (bool)static::digitalRead($pin);
        static::digitalWrite($pin, !$currentStatus);
        
        return !$currentStatus;
    }
    
    static function wiringPiFailure($fatal,$message) {
        return wiringPiFailure($fatal,$message);
    }
    
    static function wiringPiFindNode($pin) {
        return wiringPiFindNode($pin);
    }
    
    static function wiringPiNewNode($pinBase,$numPins) {
        return wiringPiNewNode($pinBase,$numPins);
    }
    
    static function wiringPiSetup() {
        
        if(static::$isSetup) {
            return;
        }
        
        static::$isSetup = true;
        
        return wiringPiSetup();
    }
    
    static function wiringPiSetupSys() {
        if(static::$isSetup) {
            return;
        }
        
        static::$isSetup = true;

        return wiringPiSetupSys();
    }
    
    static function wiringPiSetupGpio() {
        if(static::$isSetup) {
            return;
        }
        
        static::$isSetup = true;
        
        return wiringPiSetupGpio();
    }
    
    static function wiringPiSetupPhys() {
        if(static::$isSetup) {
            return;
        }
        
        static::$isSetup = true;
        
        
        return wiringPiSetupPhys();
    }
    
    static function pinModeAlt($pin,$mode) {
        pinModeAlt($pin,$mode);
    }
    
    static function pinMode($pin,$mode) {
        pinMode($pin,$mode);
    }
    
    static function pullUpDnControl($pin,$pud) {
        pullUpDnControl($pin,$pud);
    }
    
    static function digitalRead($pin) {
        return digitalRead($pin);
    }
    
    static function digitalWrite($pin,$value) {
        digitalWrite($pin,$value);
    }
    
    static function pwmWrite($pin,$value) {
        pwmWrite($pin,$value);
    }
    
    static function analogRead($pin) {
        return analogRead($pin);
    }
    
    static function analogWrite($pin,$value) {
        analogWrite($pin,$value);
    }
    
    static function piBoardRev() {
        return piBoardRev();
    }
    
    static function piBoardId($model,$rev,$mem,$maker,$overVolted) {
        piBoardId($model,$rev,$mem,$maker,$overVolted);
    }
    
    static function wpiPinToGpio($wpiPin) {
        return wpiPinToGpio($wpiPin);
    }
    
    static function physPinToGpio($physPin) {
        return physPinToGpio($physPin);
    }
    
    static function setPadDrive($group,$value) {
        setPadDrive($group,$value);
    }
    
    static function getAlt($pin) {
        return getAlt($pin);
    }
    
    static function pwmToneWrite($pin,$freq) {
        pwmToneWrite($pin,$freq);
    }
    
    static function digitalWriteByte($value) {
        digitalWriteByte($value);
    }
    
    static function digitalReadByte() {
        return digitalReadByte();
    }
    
    static function pwmSetMode($mode) {
        pwmSetMode($mode);
    }
    
    static function pwmSetRange($range) {
        pwmSetRange($range);
    }
    
    static function pwmSetClock($divisor) {
        pwmSetClock($divisor);
    }
    
    static function gpioClockSet($pin,$freq) {
        gpioClockSet($pin,$freq);
    }
    
    static function waitForInterrupt($pin,$mS) {
        return waitForInterrupt($pin,$mS);
    }
    
    static function piThreadCreate($fn) {
        return piThreadCreate($fn);
    }
    
    static function piLock($key) {
        piLock($key);
    }
    
    static function piUnlock($key) {
        piUnlock($key);
    }
    
    static function piHiPri($pri) {
        return piHiPri($pri);
    }
    
    static function delay($howLong) {
        delay($howLong);
    }
    
    static function delayMicroseconds($howLong) {
        delayMicroseconds($howLong);
    }
    
    static function millis() {
        return millis();
    }
    
    static function micros() {
        return micros();
    }
    
    static function wiringPiI2CRead($fd) {
        return wiringPiI2CRead($fd);
    }
    
    static function wiringPiI2CReadReg8($fd,$reg) {
        return wiringPiI2CReadReg8($fd,$reg);
    }
    
    static function wiringPiI2CReadReg16($fd,$reg) {
        return wiringPiI2CReadReg16($fd,$reg);
    }
    
    static function wiringPiI2CWrite($fd,$data) {
        return wiringPiI2CWrite($fd,$data);
    }
    
    static function wiringPiI2CWriteReg8($fd,$reg,$data) {
        return wiringPiI2CWriteReg8($fd,$reg,$data);
    }
    
    static function wiringPiI2CWriteReg16($fd,$reg,$data) {
        return wiringPiI2CWriteReg16($fd,$reg,$data);
    }
    
    static function wiringPiI2CSetupInterface($device,$devId) {
        return wiringPiI2CSetupInterface($device,$devId);
    }
    
    static function wiringPiI2CSetup($devId) {
        return wiringPiI2CSetup($devId);
    }
    
    static function wiringPiSPIGetFd($channel) {
        return wiringPiSPIGetFd($channel);
    }
    
    static function wiringPiSPIDataRW($channel,$data,$len) {
        return wiringPiSPIDataRW($channel,$data,$len);
    }
    
    static function wiringPiSPISetupMode($channel,$speed,$mode) {
        return wiringPiSPISetupMode($channel,$speed,$mode);
    }
    
    static function wiringPiSPISetup($channel,$speed) {
        return wiringPiSPISetup($channel,$speed);
    }
    
    static function serialOpen($device,$baud) {
        return serialOpen($device,$baud);
    }
    
    static function serialClose($fd) {
        serialClose($fd);
    }
    
    static function serialFlush($fd) {
        serialFlush($fd);
    }
    
    static function serialPutchar($fd,$c_) {
        serialPutchar($fd,$c_);
    }
    
    static function serialPuts($fd,$s) {
        serialPuts($fd,$s);
    }
    
    static function serialPrintf($fd,$message) {
        serialPrintf($fd,$message);
    }
    
    static function serialDataAvail($fd) {
        return serialDataAvail($fd);
    }
    
    static function serialGetchar($fd) {
        return serialGetchar($fd);
    }
    
    static function shiftIn($dPin,$cPin,$order) {
        return shiftIn($dPin,$cPin,$order);
    }
    
    static function shiftOut($dPin,$cPin,$order,$val) {
        shiftOut($dPin,$cPin,$order,$val);
    }
    
    static function drcSetupSerial($pinBase,$numPins,$device,$baud) {
        return drcSetupSerial($pinBase,$numPins,$device,$baud);
    }
    
    static function ads1115Setup($pinBase,$i2cAddress) {
        return ads1115Setup($pinBase,$i2cAddress);
    }
    
    static function max31855Setup($pinBase,$spiChannel) {
        return max31855Setup($pinBase,$spiChannel);
    }
    
    static function max5322Setup($pinBase,$spiChannel) {
        return max5322Setup($pinBase,$spiChannel);
    }
    
    static function mcp23008Setup($pinBase,$i2cAddress) {
        return mcp23008Setup($pinBase,$i2cAddress);
    }
    
    static function mcp23016Setup($pinBase,$i2cAddress) {
        return mcp23016Setup($pinBase,$i2cAddress);
    }
    
    static function mcp23017Setup($pinBase,$i2cAddress) {
        return mcp23017Setup($pinBase,$i2cAddress);
    }
    
    static function mcp23s08Setup($pinBase,$spiPort,$devId) {
        return mcp23s08Setup($pinBase,$spiPort,$devId);
    }
    
    static function mcp23s17Setup($pinBase,$spiPort,$devId) {
        return mcp23s17Setup($pinBase,$spiPort,$devId);
    }
    
    static function mcp3002Setup($pinBase,$spiChannel) {
        return mcp3002Setup($pinBase,$spiChannel);
    }
    
    static function mcp3004Setup($pinBase,$spiChannel) {
        return mcp3004Setup($pinBase,$spiChannel);
    }
    
    static function mcp3422Setup($pinBase,$i2cAddress,$sampleRate,$gain) {
        return mcp3422Setup($pinBase,$i2cAddress,$sampleRate,$gain);
    }
    
    static function mcp4802Setup($pinBase,$spiChannel) {
        return mcp4802Setup($pinBase,$spiChannel);
    }
    
    static function pcf8574Setup($pinBase,$i2cAddress) {
        return pcf8574Setup($pinBase,$i2cAddress);
    }
    
    static function pcf8591Setup($pinBase,$i2cAddress) {
        return pcf8591Setup($pinBase,$i2cAddress);
    }
    
    static function sn3218Setup($pinBase) {
        return sn3218Setup($pinBase);
    }
    
    static function softPwmCreate($pin,$value,$range) {
        return softPwmCreate($pin,$value,$range);
    }
    
    static function softPwmWrite($pin,$value) {
        softPwmWrite($pin,$value);
    }
    
    static function softPwmStop($pin) {
        softPwmStop($pin);
    }
    
    static function softServoWrite($pin,$value) {
        softServoWrite($pin,$value);
    }
    
    static function softServoSetup($p0,$p1,$p2,$p3,$p4,$p5,$p6,$p7) {
        return softServoSetup($p0,$p1,$p2,$p3,$p4,$p5,$p6,$p7);
    }
    
    static function softToneCreate($pin) {
        return softToneCreate($pin);
    }
    
    static function softToneStop($pin) {
        softToneStop($pin);
    }
    
    static function softToneWrite($pin,$freq) {
        softToneWrite($pin,$freq);
    }
    
    static function sr595Setup($pinBase,$numPins,$dataPin,$clockPin,$latchPin) {
        return sr595Setup($pinBase,$numPins,$dataPin,$clockPin,$latchPin);
    }
    
    static function ds1302rtcRead($reg) {
        return ds1302rtcRead($reg);
    }
    
    static function ds1302rtcWrite($reg,$data) {
        ds1302rtcWrite($reg,$data);
    }
    
    static function ds1302ramRead($addr) {
        return ds1302ramRead($addr);
    }
    
    static function ds1302ramWrite($addr,$data) {
        ds1302ramWrite($addr,$data);
    }
    
    static function ds1302clockRead($clockData) {
        ds1302clockRead($clockData);
    }
    
    static function ds1302clockWrite($clockData) {
        ds1302clockWrite($clockData);
    }
    
    static function ds1302trickleCharge($diodes,$resistors) {
        ds1302trickleCharge($diodes,$resistors);
    }
    
    static function ds1302setup($clockPin,$dataPin,$csPin) {
        ds1302setup($clockPin,$dataPin,$csPin);
    }
    
    static function gertboardAnalogWrite($chan,$value) {
        gertboardAnalogWrite($chan,$value);
    }
    
    static function gertboardAnalogRead($chan) {
        return gertboardAnalogRead($chan);
    }
    
    static function gertboardSPISetup() {
        return gertboardSPISetup();
    }
    
    static function gertboardAnalogSetup($pinBase) {
        return gertboardAnalogSetup($pinBase);
    }
    
    static function lcd128x64setOrigin($x,$y) {
        lcd128x64setOrigin($x,$y);
    }
    
    static function lcd128x64setOrientation($orientation) {
        lcd128x64setOrientation($orientation);
    }
    
    static function lcd128x64orientCoordinates($x,$y) {
        lcd128x64orientCoordinates($x,$y);
    }
    
    static function lcd128x64getScreenSize($x,$y) {
        lcd128x64getScreenSize($x,$y);
    }
    
    static function lcd128x64point($x,$y,$colour) {
        lcd128x64point($x,$y,$colour);
    }
    
    static function lcd128x64line($x0,$y0,$x1,$y1,$colour) {
        lcd128x64line($x0,$y0,$x1,$y1,$colour);
    }
    
    static function lcd128x64lineTo($x,$y,$colour) {
        lcd128x64lineTo($x,$y,$colour);
    }
    
    static function lcd128x64rectangle($x1,$y1,$x2,$y2,$colour,$filled) {
        lcd128x64rectangle($x1,$y1,$x2,$y2,$colour,$filled);
    }
    
    static function lcd128x64circle($x,$y,$r_,$colour,$filled) {
        lcd128x64circle($x,$y,$r_,$colour,$filled);
    }
    
    static function lcd128x64ellipse($cx,$cy,$xRadius,$yRadius,$colour,$filled) {
        lcd128x64ellipse($cx,$cy,$xRadius,$yRadius,$colour,$filled);
    }
    
    static function lcd128x64putchar($x,$y,$c_,$bgCol,$fgCol) {
        lcd128x64putchar($x,$y,$c_,$bgCol,$fgCol);
    }
    
    static function lcd128x64puts($x,$y,$str,$bgCol,$fgCol) {
        lcd128x64puts($x,$y,$str,$bgCol,$fgCol);
    }
    
    static function lcd128x64update() {
        lcd128x64update();
    }
    
    static function lcd128x64clear($colour) {
        lcd128x64clear($colour);
    }
    
    static function lcd128x64setup() {
        return lcd128x64setup();
    }
    
    static function lcdHome($fd) {
        lcdHome($fd);
    }
    
    static function lcdClear($fd) {
        lcdClear($fd);
    }
    
    static function lcdDisplay($fd,$state) {
        lcdDisplay($fd,$state);
    }
    
    static function lcdCursor($fd,$state) {
        lcdCursor($fd,$state);
    }
    
    static function lcdCursorBlink($fd,$state) {
        lcdCursorBlink($fd,$state);
    }
    
    static function lcdSendCommand($fd,$command) {
        lcdSendCommand($fd,$command);
    }
    
    static function lcdPosition($fd,$x,$y) {
        lcdPosition($fd,$x,$y);
    }
    
    static function lcdCharDef($fd,$index,$data) {
        lcdCharDef($fd,$index,$data);
    }
    
    static function lcdPutchar($fd,$data) {
        lcdPutchar($fd,$data);
    }
    
    static function lcdPuts($fd,$string) {
        lcdPuts($fd,$string);
    }
    
    static function lcdPrintf($fd,$message) {
        lcdPrintf($fd,$message);
    }
    
    static function lcdInit($rows,$cols,$bits,$rs,$strb,$d0,$d1,$d2,$d3,$d4,$d5,$d6,$d7) {
        return lcdInit($rows,$cols,$bits,$rs,$strb,$d0,$d1,$d2,$d3,$d4,$d5,$d6,$d7);
    }
    
    static function maxDetectRead($pin,$buffer) {
        return maxDetectRead($pin,$buffer);
    }
    
    static function readRHT03($pin,$temp,$rh) {
        return readRHT03($pin,$temp,$rh);
    }
    
    static function piGlow1($leg,$ring,$intensity) {
        piGlow1($leg,$ring,$intensity);
    }
    
    static function piGlowLeg($leg,$intensity) {
        piGlowLeg($leg,$intensity);
    }
    
    static function piGlowRing($ring,$intensity) {
        piGlowRing($ring,$intensity);
    }
    
    static function piGlowSetup($clear) {
        piGlowSetup($clear);
    }
    
    static function setupNesJoystick($dPin,$cPin,$lPin) {
        return setupNesJoystick($dPin,$cPin,$lPin);
    }
    
    static function readNesJoystick($joystick) {
        return readNesJoystick($joystick);
    }
    
    static function scrollPhatPoint($x,$y,$colour) {
        scrollPhatPoint($x,$y,$colour);
    }
    
    static function scrollPhatLine($x0,$y0,$x1,$y1,$colour) {
        scrollPhatLine($x0,$y0,$x1,$y1,$colour);
    }
    
    static function scrollPhatLineTo($x,$y,$colour) {
        scrollPhatLineTo($x,$y,$colour);
    }
    
    static function scrollPhatRectangle($x1,$y1,$x2,$y2,$colour,$filled) {
        scrollPhatRectangle($x1,$y1,$x2,$y2,$colour,$filled);
    }
    
    static function scrollPhatUpdate() {
        scrollPhatUpdate();
    }
    
    static function scrollPhatClear() {
        scrollPhatClear();
    }
    
    static function scrollPhatPutchar($c_) {
        return scrollPhatPutchar($c_);
    }
    
    static function scrollPhatPuts($str) {
        scrollPhatPuts($str);
    }
    
    static function scrollPhatPrintf($message) {
        scrollPhatPrintf($message);
    }
    
    static function scrollPhatPrintSpeed($cps10) {
        scrollPhatPrintSpeed($cps10);
    }
    
    static function scrollPhatIntensity($percent) {
        scrollPhatIntensity($percent);
    }
    
    static function scrollPhatSetup() {
        return scrollPhatSetup();
    }    
}