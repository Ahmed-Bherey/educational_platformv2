<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookDrive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookDriveController extends Controller
{
    //
    public function create()
    {
        $bookDrives = BookDrive::get();
        return view('admin.pages.bookDrives.create', compact('bookDrives'));
    }

    public function store(Request $request)
    {
        BookDrive::create([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success' => " تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $bookDrive = BookDrive::findOrFail($id);
        return view('admin.pages.bookDrives.edit', compact('bookDrive'));
    }

    public function update(Request $request, $id)
    {
        $bookDrive = BookDrive::findOrFail($id);
        $bookDrive->update([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->route('bookDrive.create')->with(['success' => " تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $bookDrive = BookDrive::findOrFail($id);
        $bookDrive->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}