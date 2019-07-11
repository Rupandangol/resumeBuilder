<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        return view('Frontend.pages.dashboard');
    }

    public function cvForm()
    {
        return view('Frontend.pages.cvForm');
    }

}
