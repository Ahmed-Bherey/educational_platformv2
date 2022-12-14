<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function create()
    {
        $users = User::get();
        return view('admin.pages.users.create', compact('users'));
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'adderess' => $request->adderess,
            'tel' => $request->tel,
            'whatsapp' => $request->whatsapp,
        ]);
        return redirect()->back()->with(['success' => " تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $password = Hash::make($request->password);
        if($request->password == ""){
            $password = $request->oldPassword;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'adderess' => $request->adderess,
            'tel' => $request->tel,
            'whatsapp' => $request->whatsapp,
        ]);
        return redirect()->route('users.create')->with(['success' => " تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        if ($id == Auth::user()->id) {
            return redirect()->back()->with(['error' => "لا يمكن حذف المستخدم الحالى"]);
        }
        $user->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
