<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use Illuminate\Http\Request ;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class FormController extends Controller
{
    public function index()
    {
        $con=Contact::all();
        return view('index',compact('con'));
    }
    public function add()
    {
       // echo 'hien thi';
      return view('add');

    }
    public function post_add()
    {
        request()->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:contact',
            'address' => 'required',
            'content' => 'required',
            'created_by' => 'required',
        ],[
            'name.required'=>'Tên không được để trống',
            'name.max'=>'Tên không được quá 150 ký tự',
            'email.unique'=>'Email đã tồn tại',
            'address.required'=>'Địa chỉ không được để trống',
            'email.required'=>'Email không được để trống',
            'content.required'=>'Nội dung không được để trống',
            'created_by.required'=>'Nội dung không được để trống',
        ]);
        Contact::create([
            'name' => request()->name,
            'address' => request()->address,
            'email' => request()->email,
            'content' => request()->content,
            'created_by' => request()->created_by,
        ]);

        return redirect()->route('index');
        
    }

    public function login()
    {
        return view('login');
    }
    public function post_login(Request $request)
    {
       
       // $password = $request->password;
       
        $check = Auth::attempt($request->only('email','password'),$request->has('remember'));
        //dd($check);
        if($check){
            return redirect()->route('AddContact');
        }
       return redirect()->back();
        // if($check){
        //     return redirect()->route('add');
        // }
        // return redirect()->back();
        
        // dd($request);
    }
    public function forget()
    {
        return view('forget');
    }
    public function post_forget(Request $request)
    {
        $email = $request->email;
        $check=User::where('email',$email)->first();
        // dd($request->toArray());
        if(!$check){
            
            return redirect()->back();
        }
        // ->with('warning','email chưa được đăng ký tạo tài khoản')
        Mail::send('emailPass',[
            
            'email'=>$request->email,
        ],function($message) use($request){
            $message->from('trandinhhan30081996@gmail.com');
            $message->to($request->email);
            $message-> subject('lấy lại mật khẩu');
        });
        return redirect()->route('login');
    }
    public function change()
    {
        return view('changePassword');
    }
    public function post_change(Request $request)
    {
        request()->validate([
            // 'name' => 'required',
            // 'email' => 'required|unique:contact',
            'password' => 'required',
            'same_password' => 'required|same:password',
            // 'email' => 'required|unique:users,email'
            
        ],[
            // 'name.required'=>'Tên không được để trống',
            // 'email.required'=>'Email không được để trống',
            // 'email.unique'=>'Email đã tồn tại',
            'password.required'=>'password không được để trống',
            'same_password.required'=>'Nhập lại mật khẩu không được để trống',
            'same_password.same' => 'Nhập lại mật khẩu không chính xác',
        ]);
        $email= $request->email;
        User::where('email',$email)->update([
            'password'=> bcrypt($request ->password),
        ]);
        return redirect()->route('login');
    }
    public function sendmail()
    {
        $Container = [
            'title' => 'TRAN DINH HAN',
            'body' => 'Xin chao moi nguoi'
        ];
        //echo 'ich';
        Mail::to('ngoich08@gmail.com')->send(new sendMail($Container));
        // Mail::subject('NGO NGO');
        echo 'gui mail thanh cong ';
        
    }
    
}
