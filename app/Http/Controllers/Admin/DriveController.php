<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DriveController extends Controller
{
    //
    public function create()
    {
        $drives = Drive::get();
        return view('admin.pages.drives.create', compact('drives'));
    }

    public function store(Request $request)
    {
        Drive::create([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success' => " تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $drive = Drive::findOrFail($id);
        return view('admin.pages.drives.edit', compact('drive'));
    }

    public function update(Request $request, $id)
    {
        $drive = Drive::findOrFail($id);
        $drive->update([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->route('drives.create')->with(['success' => " تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $drive = Drive::findOrFail($id);
        $drive->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
