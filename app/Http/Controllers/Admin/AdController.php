<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdRequest;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    //
    public function create()
    {
        $ads = Ad::first();
        return view('admin.pages.ads.create', compact('ads'));
    }

    public function store(StoreAdRequest $request)
    {
        $img = null;
        if (isset($request->img)) {
            $img = $request->img->store('public/img/ads');
        }
        Ad::updateOrCreate([], [
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
        $ads = Ad::findOrFail($id);
        $ads->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
