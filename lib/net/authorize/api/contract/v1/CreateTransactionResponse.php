<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing CreateTransactionResponse
 */
class CreateTransactionResponse extends ANetApiResponseType
{

    /**
     * @property \net\authorize\api\contract\v1\TransactionResponseType
     * $transactionResponse
     */
    private $transactionResponse = null;

    /**
     * @property \net\authorize\api\contract\v1\CreateProfileResponseType
     * $profileResponse
     */
    private $profileResponse = null;

    /**
     * Gets as transactionResponse
     *
     * @return \net\authorize\api\contract\v1\TransactionResponseType
     */
    public function getTransactionResponse()
    {
        return $this->transactionResponse;
    }

    /**
     * Sets a new transactionResponse
     *
     * @param \net\authorize\api\contract\v1\TransactionResponseType
     * $transactionResponse
     * @return self
     */
    public function setTransactionResponse(\net\authorize\api\contract\v1\TransactionResponseType $transactionResponse)
    {
        $this->transactionResponse = $transactionResponse;
        return $this;
    }

    /**
     * Gets as profileResponse
     *
     * @return \net\authorize\api\contract\v1\CreateProfileResponseType
     */
    public function getProfileResponse()
    {
        return $this->profileResponse;
    }

    /**
     * Sets a new profileResponse
     *
     * @param \net\authorize\api\contract\v1\CreateProfileResponseType $profileResponse
     * @return self
     */
    public function setProfileResponse(\net\authorize\api\contract\v1\CreateProfileResponseType $profileResponse)
    {
        $this->profileResponse = $profileResponse;
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
