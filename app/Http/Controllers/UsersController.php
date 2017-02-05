<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

use App\Models\User;

use Auth;

class UsersController extends Controller
{
    /*
     * 构造器方法
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'only'  =>  ['edit', 'update', 'destroy']
        ]);
        $this->middleware('guest', [
            'only'  =>  'create'
        ]);
    }

    /*
     * 列出所有用户
     */
    public function index(){
        $users = User::paginate(30);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }
    public function show($id){
        $user = User::findOrFail($id);
        $statuses = $user->statuses()
            ->orderBy('created_at', 'desc')
            ->paginate(30);
        $count = User::where('id', '<=', $user->id)->count();
        return view('users.show', compact('user','count', 'statuses'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required|min:5|max:20',
            'email'=> 'required|unique:users|email',
            'password'=>'required|confirmed'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        $this->sendConfirmEmail($user);
        session()->flash('success', '已发送确认邮件至您的邮箱,请前往您的邮箱'.$user->email.'确认您的邮件');
        return redirect()->route('users.show', [$user]);

    }
    public function edit($id){
        $user = User::find($id);
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }
    public function update($id, Request $request){
        $this->validate($request, [
            'name'      =>  'required|min:5|max:20',
            'password'  =>  'confirmed|min:6'
        ]);

        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $user_info = [
            'name'      =>   $request->name,
            'password'  =>   $request->password
        ];
        $user_info = array_filter($user_info);
        $user->update($user_info);
        session()->flash('success', '更新资料成功');
        return redirect()->route('users.show', $id);
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '删除成功');
        return back();
    }
    /*
     * 发送确认邮件
     */
    public function sendConfirmEmail($user){
        $view = 'emails.confirm';
        $data = compact('user');
        $from = '724099654@qq.com';
        $name = 'leijun';
        $to = $user->email;
        $subject = "感谢注册 Sample 应用！请确认你的邮箱。";

        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

    /*
     * 确认邮件
     */
    public function confirmEmail($token){
        $user = User::where('activation_token', $token)->firstOrFail();
        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);

        session()->flash('success', '恭喜您,已激活成功');
        return redirect()->route('users.show', [$user]);
    }
}
