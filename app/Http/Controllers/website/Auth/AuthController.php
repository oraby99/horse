<?php

namespace App\Http\Controllers\website\Auth;

use Exception;
use App\Models\User;
use App\Http\Utils\SMS;
use App\Traits\FilesTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;

class AuthController extends Controller
{
    use  FilesTrait;
    public function loginView()
    {
        return view('auth.auth');
    }
    public function login(LoginRequest $request)
    {
        $data =  $request->validated();
        $user = User::where('phone', $data['phone'])->first();
        $is_login = Auth::attempt(['phone' => $request->phone, 'password' => $request->password]);
        $data['otp'] = $this->generateOtp();
        if ($is_login) {
            if (Hash::check($data['password'], $user->password)) {
                // $message = 'Your Otp is ' . $data['otp'];
                // $sms = SMS::sendSms($data['phone'], $message);
                // $user->update([
                //     'otp' => $data['otp'],
                // ]);
                return redirect()->route('home')->with(['success' => 'login succesfully !']);
            } else {
                return redirect()->back()->with('error', 'Invalid Phone or Password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Phone or Password');
        }
    }
    public function registerView()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['otp'] = $this->generateOtp();
        $data['password'] = Hash::make($data['password']);
        $message = 'Your Otp is ' . $data['otp'];
        $sms = SMS::sendSms($data['phone'], $message);
        if (User::create($data)) {
            return redirect()->route('verify')->with(['success' => 'SMS Sent', 'phone' => $data['phone']]);
        } else {
            return redirect()->route('login')->with('error', 'Error occurred while registering.');
        }
    }
    public function verify()
    {
        return view('verify.verify');
    }
    public function checkOtp(Request $request)
    {
        $user = User::where('otp',$request->otp)->first();
        if($user)
        {
            Auth::login($user,false);
            $user->update([
                'is_verified'=>true,
                'otp'=>null
            ]);
            return redirect()->route('home')->with('success','Welcome Back');
        }else{
            return redirect()->back()->with('error','Invaild OTP');
        }
    }
    public function resend($phone)
    {
        $data['otp'] = $this->generateOtp();

        try {
            $message = 'Your Otp is ' . $data['otp'];
            $sms = SMS::sendSms($phone, $message);

            $user = User::where('phone', $phone)->first();

            if ($user) {
                $user->update([
                    'otp' => $data['otp'],
                ]);

                return redirect()->route('verify.view', $user->phone)->with('success', 'SMS Sent');
            } else {
                // Log or handle the case where the user is not found
                return redirect()->back()->with('error', 'User not found');
            }
        } catch (Exception $e) {
            // Log or handle the exception
            return $e;
        }
    }
    public function updateFCM(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update([
            'notification_token'=>$request->token
        ]);
        return response()->json([
            'status'=>200,
            'message'=>'Done',
            'data'=>$user
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->back()->with('success','Logout Succesfuly');
    }
    private function generateOtp()
    {
        $otp = rand(10000,99999);
        return $otp;
    }
}
