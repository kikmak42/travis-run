<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing UpdateCustomerShippingAddressRequest
 */
class UpdateCustomerShippingAddressRequest extends ANetApiRequestType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property \net\authorize\api\contract\v1\CustomerAddressExType $address
     */
    private $address = null;

    /**
     * @property boolean $defaultShippingAddress
     */
    private $defaultShippingAddress = null;

    /**
     * Gets as customerProfileId
     *
     * @return string
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * Sets a new customerProfileId
     *
     * @param string $customerProfileId
     * @return self
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

    /**
     * Gets as address
     *
     * @return \net\authorize\api\contract\v1\CustomerAddressExType
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets a new address
     *
     * @param \net\authorize\api\contract\v1\CustomerAddressExType $address
     * @return self
     */
    public function setAddress(\net\authorize\api\contract\v1\CustomerAddressExType $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Gets as defaultShippingAddress
     *
     * @return boolean
     */
    public function getDefaultShippingAddress()
    {
        return $this->defaultShippingAddress;
    }

    /**
     * Sets a new defaultShippingAddress
     *
     * @param boolean $defaultShippingAddress
     * @return self
     */
    public function setDefaultShippingAddress($defaultShippingAddress)
    {
        $this->defaultShippingAddress = $defaultShippingAddress;
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

