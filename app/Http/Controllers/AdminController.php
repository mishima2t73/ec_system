<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show_setting()
    {
        //$id = Auth::id();
        return view('delivery/setting');
    }
}
