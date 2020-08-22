<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

class PhoneVerify{
    private $sid    = "AC9c3da76429e805fe1978a9e993364797";
    private $token  = "a0899b7e873a68359096434ab8133913";

    public static function Instance($phone)
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new PhoneVerify($phone);
        }
        return $inst;
    }

    private function __construct($phone)
    {
        $this->phone = "+2".$phone;
        $this->twilio = new Client($this->sid, $this->token);
        $this->service = $this->twilio->verify->v2->services->create("My service");
    }

    function service($service_name){
        $this->service = $this->twilio->verify->v2->services->create($service_name);
    }

    function verification(){
        return $this->twilio->verify->v2->services($this->service->sid)->verifications->create($this->phone, "sms");
    }

    function verificat_check($code, $serviceID){
        return $this->twilio->verify->v2->services($serviceID)
        ->verificationChecks
        ->create($code, // code
                 ["to" => $this->phone]
        );
    }
}