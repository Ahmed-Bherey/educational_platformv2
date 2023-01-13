<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookDrive;
use Illuminate\Http\Request;
use App\Models\BookDriveFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookDriveFileController extends Controller
{
    //
    public function create()
    {
        $bookDrives = BookDrive::get();
        $bookDriveFiles = BookDriveFile::get();
        return view('admin.pages.bookDriveFiles.create', compact('bookDriveFiles', 'bookDrives'));
    }

    public function store(Request $request)
    {
        $file = null;
        if (isset($request->file)) {
            $filePrepare = $request->file("file");
            $file = time() . "_" . $filePrepare->getClientOriginalName();
            $filePrepare->move('uploads/file', $file);
        }

        $img = null;
        if (isset($request->img)) {
            $imgPrepare = $request->file("img");
            $img = time() . "_" . $imgPrepare->getClientOriginalName();
            $imgPrepare->move('uploads/img', $img);
        }

        BookDriveFile::create([
            'user_id' => Auth::user()->id,
            'bookDrive_id' => $request->bookDrive_id,
            'date' => $request->date,
            'file' => $file,
            'img' => $img,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success' => " تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $bookDrives = BookDrive::get();
        $bookDriveFile = BookDriveFile::findOrFail($id);
        return view('admin.pages.bookDriveFiles.edit', compact('bookDriveFile', 'bookDrives'));
    }

    public function update(Request $request, $id)
    {
        $bookDriveFile = BookDriveFile::findOrFail($id);
        $file = $bookDriveFile->file;
        if (isset($request->file)) {
            $filePrepare = $request->file("file");
            $file = time() . "_" . $filePrepare->getClientOriginalName();
            $filePrepare->move('uploads/file', $file);
        }

        $img = $bookDriveFile->img;
        if (isset($request->img)) {
            $imgPrepare = $request->file("img");
            $img = time() . "_" . $imgPrepare->getClientOriginalName();
            $imgPrepare->move('uploads/img', $img);
        }
        $bookDriveFile->update([
            'user_id' => Auth::user()->id,
            'bookDrive_id' => $request->bookDrive_id,
            'date' => $request->date,
            'file' => $file,
            'img' => $img,
            'name' => $request->name,
            'notes' => $request->notes,
        ]);
        return redirect()->route('driveFile.create')->with(['success' => " تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $bookDriveFile = BookDriveFile::findOrFail($id);
        $bookDriveFile->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
