<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class LanguageController extends Controller
{
    public function index(Request $request,$language)
    {
        
        if($language){
            Session::put('language',$language);
        }
        App::setLocale($language);
        // $col= collect(['hello']);
        // print_r($col);
        return redirect()->back();
    }
}
