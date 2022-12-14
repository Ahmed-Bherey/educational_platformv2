<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    //
    public function create()
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('admin.pages.subCategories.create', compact('subCategories','categories'));
    }

    public function store(Request $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/sub_categories');
        }
        SubCategory::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'name' => $request->name,
            'color' => $request->color,
            'icon_color' => $request->icon_color,
            'img' => $img,
            'notes' => $request->notes,
            'icon' => $request->icon,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $categories = Category::get();
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.pages.subCategories.edit', compact('subCategory','categories'));
    }

    public function update(Request $request, $id)
    {
        $subCategories = SubCategory::findOrFail($id);
        $img = $subCategories->img;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/categories');
        }
        $subCategories->update([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'name' => $request->name,
            'color' => $request->color,
            'icon_color' => $request->icon_color,
            'img' => $img,
            'notes' => $request->notes,
            'icon' => $request->icon,
        ]);
        return redirect()->route('subCategory.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $subCategories = SubCategory::findOrFail($id);
        $subCategories->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}