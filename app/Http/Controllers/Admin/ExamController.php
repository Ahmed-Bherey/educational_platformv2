<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Models\Category;
use App\Models\Exam;
use App\Models\SubCategory;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Subset;

class ExamController extends Controller
{
    //
    public function create()
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $subjects = Subject::get();
        $exams = Exam::get();
        return view('admin.pages.exams.create', compact('exams', 'categories', 'subCategories', 'subjects'));
    }

    public function store(StoreExamRequest $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/exams');
        }

        Exam::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'subCategory_id' => $request->subCategory_id,
            'subject_id' => $request->subject_id,
            'date' => $request->date,
            'name' => $request->name,
            'img' => $img,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success' => " تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $subjects = Subject::get();
        $exam = Exam::findOrFail($id);
        return view('admin.pages.exams.edit', compact('exam', 'categories', 'subCategories', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $img = $exam->img;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/exams');
        }
        $exam->update([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'subCategory_id' => $request->subCategory_id,
            'subject_id' => $request->subject_id,
            'date' => $request->date,
            'name' => $request->name,
            'img' => $img,
            'notes' => $request->notes,
        ]);
        return redirect()->route('exam.create')->with(['success' => " تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }

    public function sub_categoryAjax($id)
    {
        $subCategoryAjax = Subject::where('subCategory_id',$id)->get();
        return json_encode($subCategoryAjax);
    }
}
