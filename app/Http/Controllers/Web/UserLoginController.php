<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    //
    public function loginForm()
    {
        return view('web.pages.auth.login');
    }

    public function login(Request $request)
    {
        if (auth()->guard('member')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            return redirect()->route('web.index')->with(['success' => 'مرحبا ' . auth()->guard('member')->user()->name . ' 😇']);
        } else {
            return redirect()->back()->with(['error' => 'هناك خطا بالبيانات' . ' 😕']);
        }
    }

    public function logout()
    {
        // dd(auth()->guard('member'));
        auth()->guard('member')->logout();
        Session::forget('yourKeyGoesHere');
        session()->regenerate();
        Artisan::call('cache:clear');
        return redirect()
            ->route('web.index')
            ->with(['success' => 'تم الخروج بنجاح' .' ☹️' ]);
    }

    public function registerForm()
    {
        return view('web.pages.auth.register');
    }

    public function register(Request $request)
    {
        $subPassword = $request->password;
        $img = null;
        if(isset($request->img)){
            $img = $request->img->store('public/member/img');
        }
        Member::create([
            'img' => $img,
            'username' => $request->username,
            'firstName' => $request->firstName,
            'secondName' => $request->secondName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'subPassword' => $subPassword,
            'job' => $request->job,
            'address' => $request->address,
            'tel' => $request->tel,
            'active' => 1,
        ]);
        return redirect()
            ->route('web.index')
            ->with(['success' => '😇 ' . 'تم التسجيل بنجاح']);
    }
}
