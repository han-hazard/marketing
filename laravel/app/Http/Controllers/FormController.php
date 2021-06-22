<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function index()
    {
        $con=Contact::all();
        return view('index',compact('con'));
    }
    public function add()
    {
        return view('add');

    }
    public function post_add()
    {
        request()->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:contact',
            'address' => 'required',
            'content' => 'required',
        ],[
            'name.required'=>'Tên không được để trống',
            'name.max'=>'Tên không được quá 150 ký tự',
            'email.unique'=>'Email đã tồn tại',
            'address.required'=>'Địa chỉ không được để trống',
            'email.required'=>'Email không được để trống',
            'content.required'=>'Nội dung không được để trống',
        ]);
        Contact::create([
            'name' => request()->name,
            'address' => request()->address,
            'email' => request()->email,
            'content' => request()->content,
        ]);

        return redirect()->route('index');
        
    }
    public function login()
    {
        return view('login');
    }
    public function post_login(Request $request)
    {
        $check = Auth::attempt($request->only('email','password'),$request->has('remember'));
        if($check){
            return redirect()->route('admin.index');
        }
        return redirect()->back();

        return redirect()->route('add');
    }
    
}
