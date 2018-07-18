<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateProfileResponseType
 *
 *
 * XSD Type: createProfileResponse
 */
class CreateProfileResponseType implements \JsonSerializable
{

    /**
     * @property \net\authorize\api\contract\v1\MessagesType $messages
     */
    private $messages = null;

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * @property string[] $customerPaymentProfileIdList
     */
    private $customerPaymentProfileIdList = null;

    /**
     * @property string[] $customerShippingAddressIdList
     */
    private $customerShippingAddressIdList = null;

    /**
     * Gets as messages
     *
     * @return \net\authorize\api\contract\v1\MessagesType
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Sets a new messages
     *
     * @param \net\authorize\api\contract\v1\MessagesType $messages
     * @return self
     */
    public function setMessages(\net\authorize\api\contract\v1\MessagesType $messages)
    {
        $this->messages = $messages;
        return $this;
    }

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
     * Adds as numericString
     *
     * @return self
     * @param string $numericString
     */
    public function addToCustomerPaymentProfileIdList($numericString)
    {
        $this->customerPaymentProfileIdList[] = $numericString;
        return $this;
    }

    /**
     * isset customerPaymentProfileIdList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetCustomerPaymentProfileIdList($index)
    {
        return isset($this->customerPaymentProfileIdList[$index]);
    }

    /**
     * unset customerPaymentProfileIdList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetCustomerPaymentProfileIdList($index)
    {
        unset($this->customerPaymentProfileIdList[$index]);
    }

    /**
     * Gets as customerPaymentProfileIdList
     *
     * @return string[]
     */
    public function getCustomerPaymentProfileIdList()
    {
        return $this->customerPaymentProfileIdList;
    }

    /**
     * Sets a new customerPaymentProfileIdList
     *
     * @param string $customerPaymentProfileIdList
     * @return self
     */
    public function setCustomerPaymentProfileIdList(array $customerPaymentProfileIdList)
    {
        $this->customerPaymentProfileIdList = $customerPaymentProfileIdList;
        return $this;
    }

    /**
     * Adds as numericString
     *
     * @return self
     * @param string $numericString
     */
    public function addToCustomerShippingAddressIdList($numericString)
    {
        $this->customerShippingAddressIdList[] = $numericString;
        return $this;
    }

    /**
     * isset customerShippingAddressIdList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetCustomerShippingAddressIdList($index)
    {
        return isset($this->customerShippingAddressIdList[$index]);
    }

    /**
     * unset customerShippingAddressIdList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetCustomerShippingAddressIdList($index)
    {
        unset($this->customerShippingAddressIdList[$index]);
    }

    /**
     * Gets as customerShippingAddressIdList
     *
     * @return string[]
     */
    public function getCustomerShippingAddressIdList()
    {
        return $this->customerShippingAddressIdList;
    }

    /**
     * Sets a new customerShippingAddressIdList
     *
     * @param string $customerShippingAddressIdList
     * @return self
     */
    public function setCustomerShippingAddressIdList(array $customerShippingAddressIdList)
    {
        $this->customerShippingAddressIdList = $customerShippingAddressIdList;
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

