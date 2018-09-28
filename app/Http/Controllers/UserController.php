<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    /**
     * 用户首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.user.index');
    }
}