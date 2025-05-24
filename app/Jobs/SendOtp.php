<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendOtp implements ShouldQueue
{
     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = Http::withHeaders([
             'beon-token' => env('BEAON_TOKEN'),
         ])->post('https://beon.chat/api/send/message/otp', $this->data);       

         if ($response->successful()) {
            $responseData = $response->json();
                
            // Example of checking specific response fields
            if (isset($responseData['status']) && $responseData['status'] == 200) {
                $otp = $responseData['data'];
                // Do something with the OTP
                $user = User::where('phone',$this->data['phoneNumber'])->first();
                $user->update(['otp'=>$otp]);
                // return "OTP sent successfully: " . $otp;
            }
        }
         Log::info('Beon API response', [
             'status' => $response->status(),
             'body' => $response->body(),
         ]);
    }
}
