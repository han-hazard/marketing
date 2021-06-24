<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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
            // 'email' => 'required|unique:contact',
            'password' => 'required',
            'same_password' => 'required|same:password',
            'email' => 'required|unique:users,email'
            
        ],[
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'password không được để trống',
            'same_password.required'=>'Nhập lại mật khẩu không được để trống',
            'same_password.same' => 'Nhập lại mật khẩu không chính xác',
        ]);
        User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => bcrypt($request ->password),
        ]);
        $data=[

        ];
        Mail::send('email',[
            'name'=>$request->name,
            'email'=>$request->email,
        ],function($message) use($request){
            $message->from('trandinhhan30081996@gmail.com',$request->name);
            $message->to($request->email);
            $message-> subject('test mail nhes');
        });
        
        return redirect()->route('user');
    } 
}
