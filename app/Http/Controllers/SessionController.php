<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class SessionController extends Controller
{
    public function create(){
        return view('session.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'email'     =>      'required|email|max:255',
            'password'  =>      'required|min:6'
        ]);
        $user = [
            'email'     =>      $request->email,
            'password'  =>      $request->password
        ];
        if(Auth::attempt($user, $request->has('remember'))){        //第二个参数设定是否开启"记住我"
            session()->flash('success', '登陆成功,欢迎回来');
            return redirect()->route('users.show', Auth::user());
        }else{
            session()->flash('error', '登陆失败,用户密码不匹配');
            return redirect()->back();
        }
    }
    public function destroy(){
        Auth::logout();
        session()->flash('success', '已经成功退出');
        return redirect()->route('login');
    }
}
