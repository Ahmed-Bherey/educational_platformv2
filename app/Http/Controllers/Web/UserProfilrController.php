<?php

namespace App\Http\Controllers\web;

use App\Models\Ad;
use App\Models\Ad2;
use App\Models\Ad3;
use App\Models\Member;
use App\Models\ExamAnser;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserProfilrController extends Controller
{
    //
    public function userProfileForm($id)
    {
        $generalSetting = GeneralSetting::first();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $examAnsers= ExamAnser::where('member_id',$id)->get();
        $userProfile = Member::findOrFail($id);
        return view('web.pages.auth.profile',compact('generalSetting','examAnsers','ads','ad2s','ad3s','userProfile'));
    }

    public function userProfileUpdate(Request $request, $id)
    {
        $password = Hash::make($request->password);
        if($request->password == ""){
            $password = $request->oldPassword;
        }
        $userProfile = Member::findOrFail($id);
        $userProfile->update([
            'username' => $request->username,
            'firstName' => $request->firstName,
            'secondName' => $request->secondName,
            'email' => $request->email,
            'password' => $password,
            'subPassword' => $request->subPassword,
            'address' => $request->address,
            'tel' => $request->tel,
        ]);
        return redirect()->back()->with(['success' => 'تم تحديث بياناتك بنجاح' . ' 😇']);
    }
}
