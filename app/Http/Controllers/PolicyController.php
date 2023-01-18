<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    //
    public function termsConditions(){
        return view('pages.termsConditions');
    }
}
