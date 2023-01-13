<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    //
    public function create()
    {
        $members = Member::get();
        return view('admin.pages.members.create', compact('members'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.pages.members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $password = Hash::make($request->password);
        if($request->password == ""){
            $password = $request->oldPassword;
        }
        $img = $member->img;
        if(isset($request->img)){
            $imgPrepare = $request->file("img");
            $img = time() . "_" . $imgPrepare->getClientOriginalName();
            $imgPrepare->move('uploads/img', $img);
        }
        $active = 0;
        if($request->active == 1){
            $active = 1;
        }
        $member->update([
            'img' =>$img,
            'username' =>$request->username,
            'email' =>$request->email,
            'job' =>$request->job,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'active' =>$active,
        ]);
        return redirect()->route('member.create')->with(['success' => " تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }

    public function active_members()
    {
        $activeMembers = Member::where('active',1)->get();
        return view('admin.pages.members.activeMembers', compact('activeMembers'));
    }

    public function nonActive_members()
    {
        $nonActiveMembers = Member::where('active','!=',1)->get();
        return view('admin.pages.members.nonActiveMembers', compact('nonActiveMembers'));
    }
}

