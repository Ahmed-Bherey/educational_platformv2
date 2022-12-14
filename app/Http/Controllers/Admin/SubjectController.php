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
        return view('admin.pages.subjects.create', compact('subjects','categories','subCategories'));
    }

    public function store(Request $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/subjects');
        }

        $file = null;
        if (isset($request->file)) {
            $file = $request->file->store('public/img/subjects');
        }

        $video = null;
        if (isset($request->video)) {
            $video = $request->video->store('public/img/subjects');
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
        return view('admin.pages.subjects.edit', compact('subject','categories','subCategories'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $img = $subject->img;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/subjects');
        }

        $file = $subject->file;
        if (isset($request->file)) {
            $file = $request->file->store('public/img/subjects');
        }

        $video = $subject->video;
        if (isset($request->video)) {
            $video = $request->video->store('public/img/subjects');
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
        $categoryAjax = SubCategory::where('category_id',$id)->get();
        return json_encode($categoryAjax);
    }
}
