<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $count = User::where('id', '<=', $user->id)->count();
        return view('users.show', compact('user','count'));
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
        Auth::login($user);
        session()->flash('success', '欢迎注册,在这里我们相互进步');
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
}
