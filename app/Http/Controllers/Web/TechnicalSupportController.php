<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechnicalSupportController extends Controller
{
    //
    public function technicalSupportShow()
    {
        return view('web.pages.TechnicalSupport');
    }
}
