<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBCreateSubscriptionRequest
 */
class ARBCreateSubscriptionRequest extends ANetApiRequestType
{

    /**
     * @property \net\authorize\api\contract\v1\ARBSubscriptionType $subscription
     */
    private $subscription = null;

    /**
     * Gets as subscription
     *
     * @return \net\authorize\api\contract\v1\ARBSubscriptionType
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * Sets a new subscription
     *
     * @param \net\authorize\api\contract\v1\ARBSubscriptionType $subscription
     * @return self
     */
    public function setSubscription(\net\authorize\api\contract\v1\ARBSubscriptionType $subscription)
    {
        $this->subscription = $subscription;
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
            $classDetails = (new \net\authorize\api\contract\v1\Mapper)->getClass(get_class() , $key);
            if (isset($value)){
                $classDetails = (new \net\authorize\api\contract\v1\Mapper)->getClass(get_class() , $key);
                if ($classDetails->className === 'Date'){
                    // echo($value->format('Y-m-d H:i:s')."\n");
                    $dateTime = $value->format('Y-m-d');
                    $values[$key] = $dateTime;
                    //echo($dateTime."\n");
                }
                else if ($classDetails->className === 'DateTime'){
                    // echo($value->format('Y-m-d H:i:s')."\n");
                    $dateTime = $value->format('Y-m-d\TH-i-s\Z');
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

}

