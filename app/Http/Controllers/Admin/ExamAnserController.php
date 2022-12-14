<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\Category;
use App\Models\ExamAnser;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamAnserController extends Controller
{
    //
    public function create()
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $subjects = Subject::get();
        $exams = Exam::get();
        $examAnsers = ExamAnser::get();
        return view('admin.pages.examAnsers.create', compact('exams','examAnsers', 'categories', 'subCategories', 'subjects'));
    }

    public function store(Request $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/examAnsers');
        }

        ExamAnser::create([
            'user_id' =>$request->user_id,
            'member_id' =>$request->member_id,
            'category_id' =>$request->category_id,
            'subCategory_id' =>$request->subCategory_id,
            'subject_id' =>$request->subject_id,
            'exam_id' =>$request->exam_id,
            'date' =>$request->date,
            'name' =>$request->name,
            'notes' =>$request->notes,
            'reponse' =>$request->reponse,
            'img' =>$img,
        ]);
        return redirect()->back()->with(['success' => " تم الارسال بنجاح"]);
    }

    public function edit($id)
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $subjects = Subject::get();
        $exams = Exam::get();
        $examAnsers = ExamAnser::findOrFail($id);
        return view('admin.pages.examAnsers.edit', compact('exams','examAnsers', 'categories', 'subCategories', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $examAnsers = ExamAnser::findOrFail($id);
        $img = $examAnsers->img;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/exams');
        }
        $examAnsers->update([
            'user_id' =>$request->user_id,
            'member_id' =>$request->member_id,
            'category_id' =>$request->category_id,
            'subCategory_id' =>$request->subCategory_id,
            'subject_id' =>$request->subject_id,
            'exam_id' =>$request->exam_id,
            'date' =>$request->date,
            'name' =>$request->name,
            'notes' =>$request->notes,
            'reponse' =>$request->reponse,
            'img' =>$img,
        ]);
        return redirect()->route('examAnser.create')->with(['success' => " تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $examAnsers = ExamAnser::findOrFail($id);
        $examAnsers->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}