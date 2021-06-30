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
    public function home()
    {
        return view('homen');
    }
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
            return redirect()->route('index');
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
        request()->validate([
            
            'email' => 'required',
            
        ],[
            
            'email.required'=>'email không được để trống',
            
        ]);
        $email = $request->email;
        $check=User::where('email',$email)->first();
        
        // dd($request->toArray());
        if(!$check){
            
            return redirect()->back()->with('error','email bạn vừa nhập chưa được đăng ký');
        }
        // ->with('warning','email chưa được đăng ký tạo tài khoản')
        Mail::send('emailPass',[
            'check'=> $check,
            'email'=>$request->email,
        ],function($message) use($request){
            $message->from('trandinhhan30081996@gmail.com');
            $message->to($request->email);
            $message-> subject('lấy lại mật khẩu');
        });
        return redirect()->route('login')->with('success','kiểm tra email của bạn nhé!!!');
    }
    public function change($id)
    {
        $re=User::find($id);
        return view('changePassword',compact('re'));
    }
    public function post_change(Request $request ,$id)
    {
        request()->validate([
            // 'name' => 'required',
            'password' => 'required',
            'same_password' => 'required|same:password',
            'email' => 'required',  
        ],[
            // 'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            // 'email.unique'=>'Email đã tồn tại',
            'password.required'=>'password không được để trống',
            'same_password.required'=>'Nhập lại mật khẩu không được để trống',
            'same_password.same' => 'Nhập lại mật khẩu không chính xác',
        ]);
        $email= $request->email;
        User::where('id',$id)->update([
            'email'=>$request->email,
            'password'=> bcrypt($request ->password),
        ]);

        return redirect()->route('login')->with('success','reset mật khẩu thành công, mời bạn đăng nhập');
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

    public function list()
    {
        $lists=User::all();
        $contact= Contact::all();
        return view('list',compact('lists','contact'));
    }
    
}
