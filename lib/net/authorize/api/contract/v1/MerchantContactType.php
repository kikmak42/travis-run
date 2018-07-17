<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing MerchantContactType
 *
 *
 * XSD Type: merchantContactType
 */
class MerchantContactType implements \JsonSerializable
{

    /**
     * @property string $merchantName
     */
    private $merchantName = null;

    /**
     * @property string $merchantAddress
     */
    private $merchantAddress = null;

    /**
     * @property string $merchantCity
     */
    private $merchantCity = null;

    /**
     * @property string $merchantState
     */
    private $merchantState = null;

    /**
     * @property string $merchantZip
     */
    private $merchantZip = null;

    /**
     * @property string $merchantPhone
     */
    private $merchantPhone = null;

    /**
     * Gets as merchantName
     *
     * @return string
     */
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    /**
     * Sets a new merchantName
     *
     * @param string $merchantName
     * @return self
     */
    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    /**
     * Gets as merchantAddress
     *
     * @return string
     */
    public function getMerchantAddress()
    {
        return $this->merchantAddress;
    }

    /**
     * Sets a new merchantAddress
     *
     * @param string $merchantAddress
     * @return self
     */
    public function setMerchantAddress($merchantAddress)
    {
        $this->merchantAddress = $merchantAddress;
        return $this;
    }

    /**
     * Gets as merchantCity
     *
     * @return string
     */
    public function getMerchantCity()
    {
        return $this->merchantCity;
    }

    /**
     * Sets a new merchantCity
     *
     * @param string $merchantCity
     * @return self
     */
    public function setMerchantCity($merchantCity)
    {
        $this->merchantCity = $merchantCity;
        return $this;
    }

    /**
     * Gets as merchantState
     *
     * @return string
     */
    public function getMerchantState()
    {
        return $this->merchantState;
    }

    /**
     * Sets a new merchantState
     *
     * @param string $merchantState
     * @return self
     */
    public function setMerchantState($merchantState)
    {
        $this->merchantState = $merchantState;
        return $this;
    }

    /**
     * Gets as merchantZip
     *
     * @return string
     */
    public function getMerchantZip()
    {
        return $this->merchantZip;
    }

    /**
     * Sets a new merchantZip
     *
     * @param string $merchantZip
     * @return self
     */
    public function setMerchantZip($merchantZip)
    {
        $this->merchantZip = $merchantZip;
        return $this;
    }

    /**
     * Gets as merchantPhone
     *
     * @return string
     */
    public function getMerchantPhone()
    {
        return $this->merchantPhone;
    }

    /**
     * Sets a new merchantPhone
     *
     * @param string $merchantPhone
     * @return self
     */
    public function setMerchantPhone($merchantPhone)
    {
        $this->merchantPhone = $merchantPhone;
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
            $classDetails = (\net\authorize\util\Mapper::Instance())->getClass(get_class() , $key);
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
            $classDetails = (\net\authorize\util\Mapper::Instance())->getClass(get_class() , $key);
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

