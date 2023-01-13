<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //
    public function create()
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $subjects = Subject::get();
        return view('admin.pages.subjects.create', compact('subjects', 'categories', 'subCategories'));
    }

    public function store(Request $request)
    {
        $img = null;
        if (isset($request->img)) {
            $imgPrepare = $request->file("img");
            $img = time() . "_" . $imgPrepare->getClientOriginalName();
            $imgPrepare->move('uploads/img', $img);
        }

        $file = null;
        if (isset($request->file)) {
            $filePrepare = $request->file("file");
            $file = time() . "_" . $filePrepare->getClientOriginalName();
            $filePrepare->move('uploads/file', $file);
        }

        $video = null;
        if (isset($request->video)) {
            $videoPrepare = $request->file("video");
            $video = time() . "_" . $videoPrepare->getClientOriginalName();
            $videoPrepare->move('uploads/video', $video);
        }
        Subject::create([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'category_id' => $request->category_id,
            'subCategory_id' => $request->subCategory_id,
            'name' => $request->name,
            'explain' => $request->explain,
            'img' => $img,
            'file' => $file,
            'video' => $video,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $subject = Subject::findOrFail($id);
        return view('admin.pages.subjects.edit', compact('subject', 'categories', 'subCategories'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $img = $subject->img;
        if (isset($request->img)) {
            $imgPrepare = $request->file("img");
            $img = time() . "_" . $imgPrepare->getClientOriginalName();
            $imgPrepare->move('uploads/img', $img);
        }

        $file = $subject->file;
        if (isset($request->file)) {
            $filePrepare = $request->file("file");
            $file = time() . "_" . $filePrepare->getClientOriginalName();
            $filePrepare->move('uploads/file', $file);
        }

        $video = $subject->video;
        if (isset($request->video)) {
            $videoPrepare = $request->file("video");
            $video = time() . "_" . $videoPrepare->getClientOriginalName();
            $videoPrepare->move('uploads/file', $video);
        }
        $subject->update([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'category_id' => $request->category_id,
            'subCategory_id' => $request->subCategory_id,
            'name' => $request->name,
            'explain' => $request->explain,
            'img' => $img,
            'file' => $file,
            'video' => $video,
        ]);
        return redirect()->route('subject.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }

    public function categoryAjax($id)
    {
        $categoryAjax = SubCategory::where('category_id', $id)->get();
        return json_encode($categoryAjax);
    }
}
