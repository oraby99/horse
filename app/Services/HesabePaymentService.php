<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HesabePaymentService
{
    protected $merchantId;
    protected $apiKey;
    protected $secretKey;
    protected $ivKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->merchantId = config('hesabe.merchant_id');
        $this->apiKey = config('hesabe.api_key');
        $this->secretKey = config('hesabe.secret_key');
        $this->ivKey = config('hesabe.iv_key');
        $this->apiUrl = config('hesabe.api_url');
    }
    public function createPayment($amount, $orderId, $returnUrl)
    {
        // Convert amount to KWD format
        $amount = number_format($amount, 3, '.', '');
        
        $data = [
            'merchantCode' => $this->merchantId,
            'amount' => $amount,
            'currency' => 'KWD',
            'version' => '2.0', // 👈 Add if required
            'orderReferenceNumber' => $orderId,
            'responseUrl' => $returnUrl,
            'failureUrl' => route('payment.failed'),
        ];
        
        try {
            // Encrypt data for security
            $encryptedData = $this->encryptData($data);
            $token = $this->generateToken($data);;
            
            \Log::info('Hesabe Payment Request:', [
                'merchantCode' => $this->merchantId,
                'url' => $this->apiUrl,
                'apiKey' => substr($this->apiKey, 0, 10) . '...' // Log partial key for debugging
            ]);
            
            $fullUrl = $this->apiUrl . '/checkout'; // Adjust according to actual API docs
            \Log::info('Full API URL:', ['url' => $fullUrl]);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($fullUrl, [
                'data' => $encryptedData,
                'token' => $token
            ]);

            
            \Log::info('Hesabe Response:', [
                'status' => $response->status(),
                'body' => $response->json()
            ]);
            
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['response']['data'])) {
                    return $responseData['response']['data'];
                } elseif (isset($responseData['response']['paymentUrl'])) {
                    return $responseData['response']['paymentUrl'];
                }
            }
            
            \Log::error('Hesabe Payment Error: ', [
                'response' => $response->json(),
                'status' => $response->status()
            ]);
            
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
            $encryptedResponse = $responseData['data'] ?? '';
            $receivedToken = $responseData['token'] ?? '';

            // Generate token from the received encrypted data
            $generatedToken = hash_hmac('sha256', $encryptedResponse, $this->secretKey);

            // Validate the token
            if (!hash_equals($generatedToken, $receivedToken)) {
                throw new \Exception('Invalid token.');
            }

            // Decrypt the response
            $decryptedData = $this->decryptData($encryptedResponse);
            $response = json_decode($decryptedData, true);

            // Check if payment was successful
            if ($response['status'] == 'success') {
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
}
