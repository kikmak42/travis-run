<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing PaymentScheduleType
 *
 *
 * XSD Type: paymentScheduleType
 */
class PaymentScheduleType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType
     * $interval
     */
    private $interval = null;

    /**
     * @property \DateTime $startDate
     */
    private $startDate = null;

    /**
     * @property integer $totalOccurrences
     */
    private $totalOccurrences = null;

    /**
     * @property integer $trialOccurrences
     */
    private $trialOccurrences = null;

    /**
     * Gets as interval
     *
     * @return \net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * Sets a new interval
     *
     * @param \net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType
     * $interval
     * @return self
     */
    public function setInterval(\net\authorize\api\contract\v1\PaymentScheduleType\IntervalAType $interval)
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * Gets as startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets a new startDate
     *
     * @param \DateTime $startDate
     * @return self
     */
    public function setStartDate(\DateTime $startDate)
    {
        $strDateOnly = $startDate->format('Y-m-d');
        $this->startDate = \DateTime::createFromFormat('!Y-m-d', $strDateOnly); 
        return $this;
    }

    /**
     * Gets as totalOccurrences
     *
     * @return integer
     */
    public function getTotalOccurrences()
    {
        return $this->totalOccurrences;
    }

    /**
     * Sets a new totalOccurrences
     *
     * @param integer $totalOccurrences
     * @return self
     */
    public function setTotalOccurrences($totalOccurrences)
    {
        $this->totalOccurrences = $totalOccurrences;
        return $this;
    }

    /**
     * Gets as trialOccurrences
     *
     * @return integer
     */
    public function getTrialOccurrences()
    {
        return $this->trialOccurrences;
    }

    /**
     * Sets a new trialOccurrences
     *
     * @param integer $trialOccurrences
     * @return self
     */
    public function setTrialOccurrences($trialOccurrences)
    {
        $this->trialOccurrences = $trialOccurrences;
        return $this;
    }


    // Json Serialize Code
    public function jsonSerialize(){
        $values = array_filter((array)get_object_vars($this),
        function ($val){
            return !is_null($val);
        });
        // echo __CLASS__ . "\n";
        foreach($values as $key => $value){
            //$classDetails = (new \net\authorize\api\contract\v1\Mapper)->getClass(get_class() , $key);
            //$classDetails = (\net\authorize\api\contract\v1\Mapper::Instance())->getClass(get_class() , $key);
            $mapper = \net\authorize\util\Mapper::Instance();
            $classDetails = $mapper->getClass(get_class() , $key);
            if (isset($value)){
                //$classDetails = (new \net\authorize\api\contract\v1\Mapper)->getClass(get_class() , $key);
                if ($classDetails->className === 'Date'){
                    // echo($value->format('Y-m-d H:i:s')."\n");
                    $dateTime = $value->format('Y-m-d');
                    $values[$key] = $dateTime;
                    //echo($dateTime."\n");
                }
                else if ($classDetails->className === 'DateTime'){
                    // echo($value->format('Y-m-d H:i:s')."\n");
                    $dateTime = $value->format('Y-m-d\TH:i:s\Z');
                    $values[$key] = $dateTime;
                    //echo($dateTime."\n");
                }
                if (is_array($value)){

                    //echo "key - $key \n";
                    //echo "value - $value \n"; 
                    if (!$classDetails->isInlineArray){

                        // $subKey = str_replace("Type", "", lcfirst((new \ReflectionClass($value[0]))->getShortName()));
                        $subKey = $classDetails->arrayEntryname;
                        $subArray = [$subKey => $value];
                        $values[$key] = $subArray;
                    //echo "subkey - $subKey \n";
                    }
                }
            }
        }
        if (get_parent_class() == ""){
            return $values;
        }
        else{
            return array_merge(parent::jsonSerialize(), $values);
        }
    }
    
    // Json Set Code
    public function set($data)
    {
        foreach($data AS $key => $value) {
            //$isarray = false;
            //$classname = (new net\authorize\api\contract\v1\Mapper)->getClass(get_class() , $key);
            //$classDetails = (new \net\authorize\api\contract\v1\Mapper)->getClass(get_class() , $key);
            //$classDetails = (\net\authorize\api\contract\v1\Mapper::Instance())->getClass(get_class() , $key);
            $mapper = \net\authorize\util\Mapper::Instance();
            $classDetails = $mapper->getClass(get_class() , $key);
            //if (substr($classname, 0, 5) === "array") {
            //  $classname = ltrim($classname, 'array<');
            //    $classname = rtrim($classname, '>');
            //    $isarray = true;
            //}
            if($classDetails !== NULL ) {
                if ($classDetails->isArray) {
                    if ($classDetails->isCustomDefined) {
                        foreach($value AS $keyChild => $valueChild) {
                            $type = new $classDetails->className;
                            $type->set($valueChild);
                            $this->{'addTo' . $key}($type);
                        }
                    }
                    else if ($classDetails->className === 'DateTime' || $classDetails->className === 'Date' ) {
                        foreach($value AS $keyChild => $valueChild) {
                            $type = new \DateTime($valueChild);
                            $this->{'addTo' . $key}($type);
                        }
                    }
                    else {
                        foreach($value AS $keyChild => $valueChild) {
                            $this->{'addTo' . $key}($valueChild);
                        }
                    }
                }
                else {
                    if ($classDetails->isCustomDefined){
                        $type = new $classDetails->className;
                        $type->set($value);
                        $this->{'set' . $key}($type);
                    }
                    else if ($classDetails->className === 'DateTime' || $classDetails->className === 'Date' ) {
                        $type = new \DateTime($value);
                        $this->{'set' . $key}($type);
                    }
                    else {
                        $this->{'set' . $key}($value);
                    }
                }
            }
        }
    }
    
}

