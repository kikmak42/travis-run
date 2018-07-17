<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetSettledBatchListRequest
 */
class GetSettledBatchListRequest extends ANetApiRequestType
{

    /**
     * @property boolean $includeStatistics
     */
    private $includeStatistics = null;

    /**
     * @property \DateTime $firstSettlementDate
     */
    private $firstSettlementDate = null;

    /**
     * @property \DateTime $lastSettlementDate
     */
    private $lastSettlementDate = null;

    /**
     * Gets as includeStatistics
     *
     * @return boolean
     */
    public function getIncludeStatistics()
    {
        return $this->includeStatistics;
    }

    /**
     * Sets a new includeStatistics
     *
     * @param boolean $includeStatistics
     * @return self
     */
    public function setIncludeStatistics($includeStatistics)
    {
        $this->includeStatistics = $includeStatistics;
        return $this;
    }

    /**
     * Gets as firstSettlementDate
     *
     * @return \DateTime
     */
    public function getFirstSettlementDate()
    {
        return $this->firstSettlementDate;
    }

    /**
     * Sets a new firstSettlementDate
     *
     * @param \DateTime $firstSettlementDate
     * @return self
     */
    public function setFirstSettlementDate(\DateTime $firstSettlementDate)
    {
        $this->firstSettlementDate = $firstSettlementDate;
        return $this;
    }

    /**
     * Gets as lastSettlementDate
     *
     * @return \DateTime
     */
    public function getLastSettlementDate()
    {
        return $this->lastSettlementDate;
    }

    /**
     * Sets a new lastSettlementDate
     *
     * @param \DateTime $lastSettlementDate
     * @return self
     */
    public function setLastSettlementDate(\DateTime $lastSettlementDate)
    {
        $this->lastSettlementDate = $lastSettlementDate;
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
    
}

