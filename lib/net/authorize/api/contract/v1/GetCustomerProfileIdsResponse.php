<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetCustomerProfileIdsResponse
 */
class GetCustomerProfileIdsResponse extends ANetApiResponseType
{

    /**
     * @property string[] $ids
     */
    private $ids = null;

    /**
     * Adds as numericString
     *
     * @return self
     * @param string $numericString
     */
    public function addToIds($numericString)
    {
        $this->ids[] = $numericString;
        return $this;
    }

    /**
     * isset ids
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetIds($index)
    {
        return isset($this->ids[$index]);
    }

    /**
     * unset ids
     *
     * @param scalar $index
     * @return void
     */
    public function unsetIds($index)
    {
        unset($this->ids[$index]);
    }

    /**
     * Gets as ids
     *
     * @return string[]
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * Sets a new ids
     *
     * @param string $ids
     * @return self
     */
    public function setIds(array $ids)
    {
        $this->ids = $ids;
        return $this;
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

