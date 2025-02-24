<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TapController extends Controller
{
    public function paymenttap(Request $request)
    {
        $data['amount']   = 1;
        $data['currency'] = "KWD";
        $data['receipt']  = "LNK";
        $data['customer']['first_name'] = "ge";
        $data['customer']['last_name']  = "my";
        $data['customer']['email']  = "dd@g.com";
        $data['customer']['phone']['country_code']  = 965;
        $data['customer']['phone']['number']  = 562244;
        $data['source']['id']  = 'src_card';
        $data['redirect']['url'] = env('APP_URL') . '/callbacktap';
        $headers = [
            "authorization: Bearer " . env('TAP_API_KEY'),
            "content-type: application/json"
        ];
        $ch  = curl_init();
        $url = "https://api.tap.company/v2/charges";
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($output);
        // dd($response);
        return redirect($response->transaction->url);
    }
    public function callbacktap(Request $request)
    {
        $input = $request->all();
        $headers = [
            "authorization: Bearer " . env('TAP_API_KEY'),
            "content-type: application/json"
        ];
        $ch  = curl_init();
        $url = "https://api.tap.company/v2/charges/".$input['tap_id'];
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($output);
        dd($response);
    }
}
