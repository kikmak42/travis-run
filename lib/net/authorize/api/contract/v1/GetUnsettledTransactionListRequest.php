<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetUnsettledTransactionListRequest
 */
class GetUnsettledTransactionListRequest extends ANetApiRequestType
{

    /**
     * @property string $status
     */
    private $status = null;

    /**
     * @property \net\authorize\api\contract\v1\TransactionListSortingType $sorting
     */
    private $sorting = null;

    /**
     * @property \net\authorize\api\contract\v1\PagingType $paging
     */
    private $paging = null;

    /**
     * Gets as status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status
     *
     * @param string $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Gets as sorting
     *
     * @return \net\authorize\api\contract\v1\TransactionListSortingType
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * Sets a new sorting
     *
     * @param \net\authorize\api\contract\v1\TransactionListSortingType $sorting
     * @return self
     */
    public function setSorting(\net\authorize\api\contract\v1\TransactionListSortingType $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }

    /**
     * Gets as paging
     *
     * @return \net\authorize\api\contract\v1\PagingType
     */
    public function getPaging()
    {
        return $this->paging;
    }

    /**
     * Sets a new paging
     *
     * @param \net\authorize\api\contract\v1\PagingType $paging
     * @return self
     */
    public function setPaging(\net\authorize\api\contract\v1\PagingType $paging)
    {
        $this->paging = $paging;
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

