<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    //
    public function termsConditions(){
        return view('pages.termsConditions');
    }
    public function privacyPolicy(){
        return view('pages.privacyPolicy');
    }
    public function aboutUs(){
        return view('pages.aboutUs');
    }
    public function contactUs(){
        return view('pages.contactUs');
    }
}
