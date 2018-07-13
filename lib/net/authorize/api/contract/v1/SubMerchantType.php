<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing SubMerchantType
 *
 *
 * XSD Type: subMerchantType
 */
class SubMerchantType implements \JsonSerializable
{

    /**
     * @property string $identifier
     */
    private $identifier = null;

    /**
     * @property string $doingBusinessAs
     */
    private $doingBusinessAs = null;

    /**
     * @property string $paymentServiceProviderName
     */
    private $paymentServiceProviderName = null;

    /**
     * @property string $paymentServiceFacilitator
     */
    private $paymentServiceFacilitator = null;

    /**
     * @property string $streetAddress
     */
    private $streetAddress = null;

    /**
     * @property string $phone
     */
    private $phone = null;

    /**
     * @property string $email
     */
    private $email = null;

    /**
     * @property string $postalCode
     */
    private $postalCode = null;

    /**
     * @property string $city
     */
    private $city = null;

    /**
     * @property string $regionCode
     */
    private $regionCode = null;

    /**
     * @property string $countryCode
     */
    private $countryCode = null;

    /**
     * Gets as identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Sets a new identifier
     *
     * @param string $identifier
     * @return self
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * Gets as doingBusinessAs
     *
     * @return string
     */
    public function getDoingBusinessAs()
    {
        return $this->doingBusinessAs;
    }

    /**
     * Sets a new doingBusinessAs
     *
     * @param string $doingBusinessAs
     * @return self
     */
    public function setDoingBusinessAs($doingBusinessAs)
    {
        $this->doingBusinessAs = $doingBusinessAs;
        return $this;
    }

    /**
     * Gets as paymentServiceProviderName
     *
     * @return string
     */
    public function getPaymentServiceProviderName()
    {
        return $this->paymentServiceProviderName;
    }

    /**
     * Sets a new paymentServiceProviderName
     *
     * @param string $paymentServiceProviderName
     * @return self
     */
    public function setPaymentServiceProviderName($paymentServiceProviderName)
    {
        $this->paymentServiceProviderName = $paymentServiceProviderName;
        return $this;
    }

    /**
     * Gets as paymentServiceFacilitator
     *
     * @return string
     */
    public function getPaymentServiceFacilitator()
    {
        return $this->paymentServiceFacilitator;
    }

    /**
     * Sets a new paymentServiceFacilitator
     *
     * @param string $paymentServiceFacilitator
     * @return self
     */
    public function setPaymentServiceFacilitator($paymentServiceFacilitator)
    {
        $this->paymentServiceFacilitator = $paymentServiceFacilitator;
        return $this;
    }

    /**
     * Gets as streetAddress
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Sets a new streetAddress
     *
     * @param string $streetAddress
     * @return self
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
        return $this;
    }

    /**
     * Gets as phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets a new phone
     *
     * @param string $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Gets as email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets a new email
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Gets as postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets a new postalCode
     *
     * @param string $postalCode
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * Gets as city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets a new city
     *
     * @param string $city
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Gets as regionCode
     *
     * @return string
     */
    public function getRegionCode()
    {
        return $this->regionCode;
    }

    /**
     * Sets a new regionCode
     *
     * @param string $regionCode
     * @return self
     */
    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
        return $this;
    }

    /**
     * Gets as countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Sets a new countryCode
     *
     * @param string $countryCode
     * @return self
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
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

    // Json Set Code
    public function set($data)
    {
        foreach($data AS $key => $value) {
            //$isarray = false;
            //$classname = (new net\authorize\api\contract\v1\Mapper)->getClass(get_class() , $key);
            $classDetails = (new \net\authorize\api\contract\v1\Mapper)->getClass(get_class() , $key);
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

