<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == UserRole::Admin) {
                return redirect()->route('admin.index');
            } else if (Auth::user()->role_id == UserRole::User) {
                return redirect()->route('index');
            }
        } else {
            return view('login');
        }
    }

    public function checkLogin(LoginRequest $request)
    {
        $data = $request->only(['email', 'password']);
        $checkLogin = Auth::attempt($data);

        if ($checkLogin && Auth::user()->role_id == UserRole::Admin) {
            return redirect()->route('admin.index');
        } else if ($checkLogin && Auth::user()->role_id == UserRole::User) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with([
                'error' => trans('messages.login_fail')
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
