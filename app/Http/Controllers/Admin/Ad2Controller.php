<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdRequest;

class Ad2Controller extends Controller
{
    //
    public function create()
    {
        $ad2s = Ad2::first();
        return view('admin.pages.ad2s.create', compact('ad2s'));
    }

    public function store(StoreAdRequest $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/ads');
        }
        Ad2::updateOrCreate([],[
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
        $ad2s = Ad2::findOrFail($id);
        $ad2s->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
