<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home');
    }
}
