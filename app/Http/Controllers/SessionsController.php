<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
            ]);

        if(Auth::attempt($credentials,$request->has('remember'))){
            session()->flash('success','恭喜您登录成功！');
            return redirect()->intended(route('users.show',[Auth::user()]));
        } else {
            session()->flash('danger','您的邮箱与密码不正确');
            return redirect()->back();
        }
    }

    public function destory()
    {
        Auth::logout();
        session()->flash('success','您已经成功退出!');
        return redirect('login');
    }
}
