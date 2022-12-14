<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad3;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdRequest;

class Ad3Controller extends Controller
{
    //
    public function create()
    {
        $ad3s = Ad3::first();
        return view('admin.pages.ad3s.create', compact('ad3s'));
    }

    public function store(StoreAdRequest $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/ads');
        }
        Ad3::updateOrCreate([],[
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'name' => $request->name,
            'img' => $img,
            'link' => $request->link,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success' => "تم الحفظ بنجاح"]);
    }

    public function destroy($id)
    {
        $ad3s = Ad3::findOrFail($id);
        $ad3s->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}