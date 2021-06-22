<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user()
    {
        $datas=User::all();
        return view('user',compact('datas'));
    }
    public function add()
    {
        return view('user_add');

    }
    public function user_add(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:contact',
            'password' => 'required',
            'same_password' => 'required|same:password',
            'created_by' => 'required',
        ],[
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'password không được để trống',
            'same_password.required'=>'same_password không được để trống',
            'same_password.same' => 'Nhập lại mật khẩu không chính xác',
            'created_by.required'=>'same_password không được để trống',
        ]);
        User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => request()->password,
            'created_by' => request()->created_by,
        ]);
        $password = bcrypt($request ->password);
        $request->merge(['password'=>$password]);
        return redirect()->route('user');
    }
}
