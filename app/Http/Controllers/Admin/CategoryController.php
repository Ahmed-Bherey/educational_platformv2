<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTotal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function create()
    {
        $categories = Category::get();
        return view('admin.pages.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/categories');
        }
        $category = Category::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'color' => $request->color,
            'icon_color' => $request->icon_color,
            'img' => $img,
            'notes' => $request->notes,
            'icon' => $request->icon,
        ]);

        foreach ($request->data['desc'] as $key => $value)
            CategoryTotal::create([
                'category_id' => $category->id,
                'desc' => $value,
            ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function edit($id)
    {
        $categoryTotals = CategoryTotal::where('category_id', $id)->get();
        $category = Category::findOrFail($id);
        return view('admin.pages.categories.edit', compact('category','categoryTotals'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $img = $category->img;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/categories');
        }
        CategoryTotal::where('category_id', $id)->delete();
        foreach ($request->data['desc'] as $key => $value) {
            CategoryTotal::create([
                'category_id' => $category->id,
                'desc' => $value,
            ]);
        }
        $category->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'color' => $request->color,
            'icon_color' => $request->icon_color,
            'img' => $img,
            'notes' => $request->notes,
            'icon' => $request->icon,
        ]);
        return redirect()->route('category.create')->with(['success' => "تم التحديث بنجاح"]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        CategoryTotal::where('category_id', $id)->delete();
        $category->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
