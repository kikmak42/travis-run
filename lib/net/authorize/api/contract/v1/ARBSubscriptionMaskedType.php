<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing ARBSubscriptionMaskedType
 *
 *
 * XSD Type: ARBSubscriptionMaskedType
 */
class ARBSubscriptionMaskedType implements \JsonSerializable
{

    /**
     * @property string $name
     */
    private $name = null;

    /**
     * @property \net\authorize\api\contract\v1\PaymentScheduleType $paymentSchedule
     */
    private $paymentSchedule = null;

    /**
     * @property float $amount
     */
    private $amount = null;

    /**
     * @property float $trialAmount
     */
    private $trialAmount = null;

    /**
     * @property string $status
     */
    private $status = null;

    /**
     * @property \net\authorize\api\contract\v1\SubscriptionCustomerProfileType
     * $profile
     */
    private $profile = null;

    /**
     * @property \net\authorize\api\contract\v1\OrderType $order
     */
    private $order = null;

    /**
     * @property \net\authorize\api\contract\v1\ArbTransactionType[] $arbTransactions
     */
    private $arbTransactions = null;

    /**
     * Gets as name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as paymentSchedule
     *
     * @return \net\authorize\api\contract\v1\PaymentScheduleType
     */
    public function getPaymentSchedule()
    {
        return $this->paymentSchedule;
    }

    /**
     * Sets a new paymentSchedule
     *
     * @param \net\authorize\api\contract\v1\PaymentScheduleType $paymentSchedule
     * @return self
     */
    public function setPaymentSchedule(\net\authorize\api\contract\v1\PaymentScheduleType $paymentSchedule)
    {
        $this->paymentSchedule = $paymentSchedule;
        return $this;
    }

    /**
     * Gets as amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * @param float $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as trialAmount
     *
     * @return float
     */
    public function getTrialAmount()
    {
        return $this->trialAmount;
    }

    /**
     * Sets a new trialAmount
     *
     * @param float $trialAmount
     * @return self
     */
    public function setTrialAmount($trialAmount)
    {
        $this->trialAmount = $trialAmount;
        return $this;
    }

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
     * Gets as profile
     *
     * @return \net\authorize\api\contract\v1\SubscriptionCustomerProfileType
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Sets a new profile
     *
     * @param \net\authorize\api\contract\v1\SubscriptionCustomerProfileType $profile
     * @return self
     */
    public function setProfile(\net\authorize\api\contract\v1\SubscriptionCustomerProfileType $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * Gets as order
     *
     * @return \net\authorize\api\contract\v1\OrderType
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets a new order
     *
     * @param \net\authorize\api\contract\v1\OrderType $order
     * @return self
     */
    public function setOrder(\net\authorize\api\contract\v1\OrderType $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Adds as arbTransaction
     *
     * @return self
     * @param \net\authorize\api\contract\v1\ArbTransactionType $arbTransaction
     */
    public function addToArbTransactions(\net\authorize\api\contract\v1\ArbTransactionType $arbTransaction)
    {
        $this->arbTransactions[] = $arbTransaction;
        return $this;
    }

    /**
     * isset arbTransactions
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetArbTransactions($index)
    {
        return isset($this->arbTransactions[$index]);
    }

    /**
     * unset arbTransactions
     *
     * @param scalar $index
     * @return void
     */
    public function unsetArbTransactions($index)
    {
        unset($this->arbTransactions[$index]);
    }

    /**
     * Gets as arbTransactions
     *
     * @return \net\authorize\api\contract\v1\ArbTransactionType[]
     */
    public function getArbTransactions()
    {
        return $this->arbTransactions;
    }

    /**
     * Sets a new arbTransactions
     *
     * @param \net\authorize\api\contract\v1\ArbTransactionType[] $arbTransactions
     * @return self
     */
    public function setArbTransactions(array $arbTransactions)
    {
        $this->arbTransactions = $arbTransactions;
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

