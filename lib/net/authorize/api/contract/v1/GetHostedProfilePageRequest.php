<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetHostedProfilePageRequest
 */
class GetHostedProfilePageRequest extends ANetApiRequestType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @property \net\authorize\api\contract\v1\SettingType[] $hostedProfileSettings
     */
    private $hostedProfileSettings = null;

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
     * Adds as setting
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @return self
     * @param \net\authorize\api\contract\v1\SettingType $setting
     */
    public function addToHostedProfileSettings(\net\authorize\api\contract\v1\SettingType $setting)
    {
        $this->hostedProfileSettings[] = $setting;
        return $this;
    }

    /**
     * isset hostedProfileSettings
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetHostedProfileSettings($index)
    {
        return isset($this->hostedProfileSettings[$index]);
    }

    /**
     * unset hostedProfileSettings
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @param scalar $index
     * @return void
     */
    public function unsetHostedProfileSettings($index)
    {
        unset($this->hostedProfileSettings[$index]);
    }

    /**
     * Gets as hostedProfileSettings
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @return \net\authorize\api\contract\v1\SettingType[]
     */
    public function getHostedProfileSettings()
    {
        return $this->hostedProfileSettings;
    }

    /**
     * Sets a new hostedProfileSettings
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @param \net\authorize\api\contract\v1\SettingType[] $hostedProfileSettings
     * @return self
     */
    public function setHostedProfileSettings(array $hostedProfileSettings)
    {
        $this->hostedProfileSettings = $hostedProfileSettings;
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

