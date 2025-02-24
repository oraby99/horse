<?php

namespace App\Http\Utils;

use Exception;
use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;
  
class SMS{

    public static function sendSms($mobile,$message)
    {
        // try {
  
            $account_sid = config("app.TWILIO_SID");
            $auth_token = config("app.TWILIO_TOKEN");
            $twilio_number = config("app.TWILIO_FROM");
            $client = new Client($account_sid, $auth_token);
            $test = $client->messages->create($mobile, [
                'from' => $twilio_number, 
                'body' => $message]);
            return true;  
        // } catch (Exception $e) {
        //     // dd("Error: ". $e->getMessage());
        //     return $e->getMessage();
        // }
    }
}