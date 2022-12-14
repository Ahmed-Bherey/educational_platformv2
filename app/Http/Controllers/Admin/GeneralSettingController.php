<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralSettingController extends Controller
{
    //
    public function create()
    {
        $generalSettings = GeneralSetting::first();
        return view('admin.pages.generalSettings.create', compact('generalSettings'));
    }

    public function store(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        if(isset($request->logo)){
            GeneralSetting::updateOrCreate([], [
                'user_id' => Auth::user()->id,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'tel3' => $request->tel3,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'address' => $request->address,
                'logo' => $request->logo->store('public/img/settings'),
                'vision' => $request->vision,
                'mission' => $request->mission,
            ]);
        }else{
            GeneralSetting::updateOrCreate([], [
                'user_id' => Auth::user()->id,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'tel3' => $request->tel3,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'address' => $request->address,
                'vision' => $request->vision,
                'mission' => $request->mission,
            ]);
        }
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }
}
