<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;

class FormController extends Controller
{
    public function index()
    {
        return view('add');
    }
    public function add()
    {
        // dd($_POST);
        return view('index');

    }
    public function post_add()
    {
        
        // $name=$request->name;
        // $address=$request->address;
        // $email=$request->email;
        // $content=$request->content;
        // return redirect()->route('view');
        
    }
}
