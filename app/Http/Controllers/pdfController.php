<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function templateItem1(){
        return view('Frontend.pages.templateItem.templateItem1');
    }
}
