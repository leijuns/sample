<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;

class UsersController extends Controller
{
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

        session()->flash('success', '欢迎注册,在这里我们相互进步');
        return redirect()->route('users.show', [$user]);

    }
}
