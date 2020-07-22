<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Echo_;

class UserController extends Controller
{

    public function index(){
        $user = User::paginate(15);
        return view('admin.account.list',compact('user'));
    }
    public function create(){
        return view('frontend.signup');
    }
    public function store(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                'name'=>'required|min:6|max:20',
                'password'=>'required|confirmed|min:6|max:20',
                'email'=>'required|email',
                'avatar'=>'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                       ->withErrors($validator)
                       ->withInput();
       }
       if ($request->hasFile('avatar')) {
        $image = $request->file('avatar');
        $destinationPath = public_path('storage/image/avatar');
        $filename = 'storage/image/avatar/'. time().'.'.$image->getClientOriginalExtension();
        $image->move($destinationPath, $filename);

        }else{
            $filename ='noimage.jpg';
        }
        $user = User::where('email',$request->email)->first();
        if(!$user){
            $newUser = new User();
            $newUser->name= $request->name;
            $newUser->password= $request->password;
            $newUser->email= $request->email;
            $newUser->avatar= $filename;
            $newUser->level= $request->level;
            $newUser->status= $request->status;
            $newUser->save();
             return redirect()->route('frontend.home')->with('message','đăng ký thành công mời đăng nhập');
        }else{
           return redirect()->route('user.login')->with('message', 'Tài khoản đã tồn tại');
        }
    }

    public function logincheck(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                'email'=>'required|email',
                'password'=>'required|alphaNum|min:6|max:16'
            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $remember = $request->input('remember_token	');
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password], $remember)){
            if(Auth::user()->status !=1){
                Auth::logout();
                return back()->with('error','Tài khoản bị khóa');
            }
            if(Auth::user()->level===-1){
                return redirect()->route('frontend.home');
            }else{
                return redirect()->route('admin.ListProduct');
            }
        }else{
            return back()->with('error','Sai Email hoặc mật khẩu mời kiểm tra lại');
        }
    }
    public function loginlayout(){
        return view('frontend.loggin');
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('user.login');
    }
}
?>
