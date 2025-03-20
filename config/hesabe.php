<?php

return [
    'version' => '2.0',
    'merchant_id' => env('HESABE_MERCHANT_ID'),
    'api_key' => env('HESABE_API_KEY'),
    'secret_key' => env('HESABE_SECRET_KEY'),
    'iv_key' => env('HESABE_IV_KEY'),
    'api_url' => env('HESABE_API_URL'),
    'success_code' => 200,
    'authentication_failed_code' => 501,
];