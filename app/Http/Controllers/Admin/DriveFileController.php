<?php

namespace App\Http\Controllers\Admin;

use App\Models\DriveFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Drive;
use Illuminate\Support\Facades\Auth;

class DriveFileController extends Controller
{
    //
    public function create()
    {
        $drives = Drive::get();
        $driveFiles = DriveFile::get();
        return view('admin.pages.driveFiles.create', compact('driveFiles', 'drives'));
    }

    public function store(Request $request)
    {
        $file = null;
        if (isset($request->file)) {
            $file = $request->file->store('public/img/driveFiles');
        }

        DriveFile::create([
            'user_id' => Auth::user()->id,
            'drive_id' => $request->drive_id,
            'date' => $request->date,
            'file_type' => $request->file_type,
            'file' => $file,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success' => " تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $drives = Drive::get();
        $driveFile = DriveFile::findOrFail($id);
        return view('admin.pages.driveFiles.edit', compact('driveFile', 'drives'));
    }

    public function update(Request $request, $id)
    {
        $driveFile = DriveFile::findOrFail($id);
        $file = $driveFile->file;
        if (isset($request->file)) {
            $file = $request->file->store('public/img/driveFiles');
        }
        $driveFile->update([
            'user_id' => Auth::user()->id,
            'drive_id' => $request->drive_id,
            'date' => $request->date,
            'file_type' => $request->file_type,
            'file' => $file,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->route('driveFile.create')->with(['success' => " تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $driveFile = DriveFile::findOrFail($id);
        $driveFile->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
