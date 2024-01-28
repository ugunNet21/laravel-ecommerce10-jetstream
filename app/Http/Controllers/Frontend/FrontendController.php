<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Banner\Banner;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $banners = Banner::all();
        return view('frontend.home', compact('banners'));
    }
}
