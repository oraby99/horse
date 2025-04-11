<?php

namespace App\Services;

use App\Helper\ModelBindingHelper;
use App\Libraries\HesabeCrypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class HesabePaymentService
{
    protected $merchantId;
    protected $apiKey;
    protected $secretKey;
    protected $ivKey;
    protected $apiUrl;

    protected $hesabeCrypt;
    protected $modelBindingHelper;
    public function __construct()
    {
        $this->merchantId = config('hesabe.merchant_id');
        $this->apiKey = config('hesabe.api_key');
        $this->secretKey = config('hesabe.secret_key');
        $this->ivKey = config('hesabe.iv_key');
        $this->apiUrl = config('hesabe.api_url');
        $this->hesabeCrypt = new HesabeCrypt();
        $this->modelBindingHelper = new ModelBindingHelper();
    }
    public function createPayment($amount, $orderId, $returnUrl)
    {
        // Convert amount to KWD format
        $amount = number_format($amount, 3, '.', '');
        
        $data = [
            'merchantCode' => $this->merchantId,
            'access_code'=>$this->apiKey,
            'amount' => $amount,
            'currency' => 'KWD',
            'version' => '2.0', // 👈 Add if required
            'orderReferenceNumber' => $orderId,
            'responseUrl' => $returnUrl,
            'failureUrl' => route('payment.failed'),
            'paymentType'=>0
        ];
        
        try {
            // Encrypt data for security
            $encryptedData = $this->hesabeCrypt::encrypt(json_encode($data),$this->secretKey , $this->ivKey);
            // $token = $this->generateToken($data);;
            
            \Log::info('Hesabe Payment Request:', [
                'merchantCode' => $this->merchantId,
                'url' => $this->apiUrl,
                'apiKey' => substr($this->apiKey, 0, 10) . '...' // Log partial key for debugging
            ]);
            $accessCode = config('hesabe.api_key');
            $fullUrl = $this->apiUrl . 'checkout'; // Adjust according to actual API docs
            \Log::info('Full API URL:', ['url' => $fullUrl]);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "$fullUrl",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('data' => $encryptedData),
                CURLOPT_HTTPHEADER => array(
                    "accessCode: $accessCode",
                    "Accept: application/json"
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
    
            $token = $this->getCheckoutResponse($response);

            
            return $token;
            // return $encryptedResponse;
            //Get encrypted data response            
            // $response = Http::withHeaders([
            //     'Authorization' => 'Bearer ' . $this->apiKey,
            //     'Content-Type' => 'application/json',
            // ])->post($fullUrl, [
            //     'data' => $encryptedData,
            //     'token' => $token
            // ]);

            
            // \Log::info('Hesabe Response:', [
            //     'status' => $response->status(),
            //     'body' => $response->json()
            // ]);
            
            // if ($response->successful()) {
            //     $responseData = $response->json();
            //     if (isset($responseData['response']['data'])) {
            //         return $responseData['response']['data'];
            //     } elseif (isset($responseData['response']['paymentUrl'])) {
            //         return $responseData['response']['paymentUrl'];
            //     }
            // }
            
            // \Log::error('Hesabe Payment Error: ', [
            //     'response' => $response->json(),
            //     'status' => $response->status()
            // ]);
            throw new \Exception('Failed to get payment URL: ' . ($response->json()['message'] ?? 'Unknown error'));
        } catch (\Exception $e) {
            \Log::error('Exception in Hesabe payment: ' . $e->getMessage());
            throw $e;
        }
    }

    
    private function encryptData($data)
    {
        $dataString = json_encode($data);
        return base64_encode(openssl_encrypt(
            $dataString,
            'AES-256-CBC',
            $this->secretKey,
            OPENSSL_RAW_DATA,
            $this->ivKey
        ));
    }
    public function verifyPayment($responseData)
    {
        try {

            // decript response 
            $Responsecode =  $this->hesabeCrypt::decrypt($responseData['data'],$this->secretKey,$this->ivKey);
            // decode response 
            $response = json_decode($Responsecode, true);
            // $encryptedResponse = $responseData['data'] ?? '';
            // $receivedToken = $responseData['token'] ?? '';

            // // Generate token from the received encrypted data
            // $generatedToken = hash_hmac('sha256', $encryptedResponse, $this->secretKey);

            // // Validate the token
            // if (!hash_equals($generatedToken, $receivedToken)) {
            //     throw new \Exception('Invalid token.');
            // }

            // // Decrypt the response
            // $decryptedData = $this->decryptData($encryptedResponse);
            // $response = json_decode($responseData, true);

            // Check if payment was successful
            if ($response['status'] == true) {
                return $response;
            }

            return ['status' => 'failed', 'message' => $response['message'] ?? 'Payment failed.'];
        } catch (\Exception $e) {
            \Log::error('Payment verification error: ' . $e->getMessage());
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
    private function decryptData($encryptedData)
    {
        $decrypted = openssl_decrypt(
            base64_decode($encryptedData),
            'AES-256-CBC',
            $this->secretKey,
            OPENSSL_RAW_DATA,
            $this->ivKey
        );

        if ($decrypted === false) {
            throw new \Exception('Failed to decrypt data.');
        }

        return $decrypted;
    }
    private function generateToken($data)
    {
        ksort($data); // Alphabetical sorting
        $queryString = urldecode(http_build_query($data));
        return hash_hmac('sha256', $queryString, $this->secretKey);
    }



    public function getCheckoutResponse($response)
    {
        // Decrypt the response from the checkout API
        $decryptResponse = $this->hesabeCrypt::decrypt($response, $this->secretKey, $this->ivKey);

        if (!$decryptResponse) {
            $decryptResponse = $response;
        }

        // De-serialize the JSON string into an object
        $decryptResponseData = json_decode($decryptResponse, true);
        // return $decryptResponseData;
        // //Binding the decrypted response data to the entity model
        $code = $decryptResponseData['response']['data'];
        return $code;
        // $decryptedResponse = $this->modelBindingHelper->getCheckoutResponseData($decryptResponseData);

        // return [$response , $decryptedResponse];
    }
}
