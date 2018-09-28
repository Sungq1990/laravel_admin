<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorityRequest;

class AuthorityController extends Controller
{
    //登录页面
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    //登录
    public function postLogin(AuthorityRequest $request)
    {
        $username = $request->input('email');
        $password = $request->input('password');
        if ($username != env('email')) {
            return redirect()->back()->withInput()
                ->withErrors(array('attempt' => '用户名错误。'));
        }

        if ($password != md5($username . env('password'))) {
            return redirect()->back()->withInput()
                ->withErrors(array('attempt' => '密码错误。'));
        }
        //登录成功
        request()->session()->put('admin_id', 1);
        request()->session()->save();

        return redirect()->intended(route('pub.home'));
    }

    //登出页面
    public function logout()
    {
        //登出
        request()->session()->forget('admin_id');
        request()->session()->save();
        return view('admin.auth.logout');
    }
}
