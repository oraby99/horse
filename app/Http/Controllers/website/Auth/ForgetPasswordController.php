<?php

namespace App\Http\Controllers\website\Auth;

use App\Jobs\SendOtp;
use Exception;
use App\Models\User;
use App\Http\Utils\SMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forget_password');
    }
    public function sendOtp(Request $request)
    {
        // return $request->all();
        $request->validate([
            'phone'=>['required']
        ]);

        $data = $request->all();
        $data['otp'] = $this->generateOtp();

        try{
       
            // $message =  'Your Otp is '.$data['otp'];
            // $sms = SMS::sendSms($data['phone'],$message);
            $user  = User::where('phone',$data['phone'])->first();
            if($user)
            {
                $json = [
                    'phoneNumber'=>$user->phone,
                    'name'=>$user->name,
                    'type'=>'whatsapp',
                    'otp_length'=>5
                ];
                SendOtp::dispatch($json);
                // $user->update([
                //     'otp'=>$data['otp'],
                // ]);
                return redirect()->route('verify.view',$user->phone)->with('success','SMS Sent');
     
            }else{
                return redirect()->back()->with('error','Invail Phone');
            }
        }catch(Exception $e)
        {
            return $e->getMessage();
        }

    }
    public function verifyView($phone)
    {
        $phone = $phone;
        return view('auth.otp',compact('phone'));
    }
    public function verify(Request $request)
    {
        $request->validate([
            'otp'=>'required'
        ]);
        $data = User::where('otp',$request->otp)->first();
        if($data)
        {
            $data->update([
                'otp'=>null
            ]);
            return redirect()->route('change-password.view')->with(['success','Correct Otp','phone'=>$data->phone]);
        }else{
            return redirect()->back()->with('error','Invaild OTP');
        }
    }
    public function resend($phone)
    {
        $data['otp'] = $this->generateOtp();
        try {
            $message = 'Your Otp is ' . $data['otp'];
            // Use $phone instead of $data['phone']
            $user = User::where('phone', $phone)->first();
            if($user)
            {
                 $json = [
                    'phoneNumber'=>$user->phone,
                    'name'=>$user->name,
                    'type'=>'whatsapp',
                    'otp_length'=>5
                ];
                SendOtp::dispatch($json);
                return redirect()->route('verify.view', $user->phone)->with('success', 'SMS Sent');
            }else{
                return redirect()->back()->with('error','Invaild Phone User Not Found');
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    public function changePasswordView()
    {
        return view('auth.change_password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'password'=>'required|confirmed'
        ]);

        $data = User::where('phone',$request->phone)->first();
        $data->update([
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('home')->with('success','Password Changed');
    }
    private function generateOtp()
    {
        $otp = rand(10000,99999);
        return $otp;
    }
}
