<?php

namespace App\Http\Controllers\website;

use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            $abroveAds     = Advertisment::where('is_active', true)->notExpire()->where('user_id', $user->id)->count();
            $NotabroveAds  = Advertisment::where('is_active', false)->notExpire()->where('user_id', $user->id)->count();
            $expireAds     = Advertisment::expire()->where('user_id', $user->id)->count();
            return view('profile.main', [
                'abroveAds'    => $abroveAds,
                'NotabroveAds' => $NotabroveAds,
                'expireAds'    => $expireAds
            ]);
        } else {
            return redirect()->route('login');
        }
    }
    public function listing(Request $request)
    {
        $data = Advertisment::where('user_id',auth()->user()->id)->filter($request->all())->latest()->paginate(8);
        return view('profile.listing',['data'=>$data]);
    }
    public function payment()
    {
        return view('profile.payment');
    }
    public function edit()
    {
        return view('profile.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'password' => 'nullable|min:3',
            'instegram_link' => 'string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = auth()->user();
        if ($request->has('change_password')) {
            if ($request->input('change_password')) {
                $user->password = bcrypt($request->input('password'));
            }
        }
            if ($request->hasFile('image')) {
            if ($user->image !== null) {
                $oldImagePath = public_path('uploads/users/') . $user->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $newImage = $request->file('image');
            $newImageName = "users-" . uniqid() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('uploads/users/'), $newImageName);
            $user->image = $newImageName;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->instegram_link = $request->input('instegram_link');
        $user->save();
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }
    public function deleteAds($id)
    {
        $data = Advertisment::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Item Removed From Favourite');
    }
}
