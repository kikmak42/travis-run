<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing FraudInformationType
 *
 *
 * XSD Type: fraudInformationType
 */
class FraudInformationType implements \JsonSerializable
{

    /**
     * @property string[] $fraudFilterList
     */
    private $fraudFilterList = null;

    /**
     * @property string $fraudAction
     */
    private $fraudAction = null;

    /**
     * Adds as fraudFilter
     *
     * @return self
     * @param string $fraudFilter
     */
    public function addToFraudFilterList($fraudFilter)
    {
        $this->fraudFilterList[] = $fraudFilter;
        return $this;
    }

    /**
     * isset fraudFilterList
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetFraudFilterList($index)
    {
        return isset($this->fraudFilterList[$index]);
    }

    /**
     * unset fraudFilterList
     *
     * @param scalar $index
     * @return void
     */
    public function unsetFraudFilterList($index)
    {
        unset($this->fraudFilterList[$index]);
    }

    /**
     * Gets as fraudFilterList
     *
     * @return string[]
     */
    public function getFraudFilterList()
    {
        return $this->fraudFilterList;
    }

    /**
     * Sets a new fraudFilterList
     *
     * @param string[] $fraudFilterList
     * @return self
     */
    public function setFraudFilterList(array $fraudFilterList)
    {
        $this->fraudFilterList = $fraudFilterList;
        return $this;
    }

    /**
     * Gets as fraudAction
     *
     * @return string
     */
    public function getFraudAction()
    {
        return $this->fraudAction;
    }

    /**
     * Sets a new fraudAction
     *
     * @param string $fraudAction
     * @return self
     */
    public function setFraudAction($fraudAction)
    {
        $this->fraudAction = $fraudAction;
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

