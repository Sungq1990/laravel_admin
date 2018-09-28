<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //非ajax请求,校验登录
        if (!$request->ajax()) {
            if (!request()->session()->get('admin_id')) {//未登录
                return redirect('auth/login');
            }
        } else {//ajax请求登录态判断
            if (!request()->session()->get('admin_id')) {
                header('HTTP/1.1: 200');
                header('Status: 200');
                header('Content-type: application/json');
                die(json_encode('sorry_login_is_invalid'));
            }
        }

        return $next($request);
    }
}
