<?php

namespace net\authorize\api\contract\v1\KeyManagementSchemeType;

/**
 * Class representing DUKPTAType
 */
class DUKPTAType implements \JsonSerializable
{

    /**
     * @property string $operation
     */
    private $operation = null;

    /**
     * @property
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\ModeAType
     * $mode
     */
    private $mode = null;

    /**
     * @property
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\DeviceInfoAType
     * $deviceInfo
     */
    private $deviceInfo = null;

    /**
     * @property
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType
     * $encryptedData
     */
    private $encryptedData = null;

    /**
     * Gets as operation
     *
     * @return string
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Sets a new operation
     *
     * @param string $operation
     * @return self
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * Gets as mode
     *
     * @return
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\ModeAType
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Sets a new mode
     *
     * @param
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\ModeAType
     * $mode
     * @return self
     */
    public function setMode(\net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\ModeAType $mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * Gets as deviceInfo
     *
     * @return
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\DeviceInfoAType
     */
    public function getDeviceInfo()
    {
        return $this->deviceInfo;
    }

    /**
     * Sets a new deviceInfo
     *
     * @param
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\DeviceInfoAType
     * $deviceInfo
     * @return self
     */
    public function setDeviceInfo(\net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\DeviceInfoAType $deviceInfo)
    {
        $this->deviceInfo = $deviceInfo;
        return $this;
    }

    /**
     * Gets as encryptedData
     *
     * @return
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType
     */
    public function getEncryptedData()
    {
        return $this->encryptedData;
    }

    /**
     * Sets a new encryptedData
     *
     * @param
     * \net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType
     * $encryptedData
     * @return self
     */
    public function setEncryptedData(\net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType $encryptedData)
    {
        $this->encryptedData = $encryptedData;
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

