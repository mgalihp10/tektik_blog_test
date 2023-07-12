<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware("auth", ["except" => ["loginBackend", "registerBackend", "saveRegister", "loginUser"]]);
    }

    public function loginBackend()
    {
        return view("backend.auth.login");
    }

    public function loginAdmin(Request $request)
    {
        $field = filter_var($request->input('login_type'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('login_type')]);

        if (!Auth::attempt($request->only($field, 'password'))) {
            // RateLimiter::hit($request->throttleKey());
     
            throw ValidationException::withMessages([
                'login_type' => trans('auth.failed'),
                // 'password' => trans('auth.failed'),
            ]);
        }

        $request->session()->regenerate();
  
        return redirect()->route('dashboard');
    }

    public function registerBackend()
    {
        return view("backend.auth.register");
    }

    public function saveRegister(Request $request)
    {
        Validator::make($request->all(), [
            "username" => "required|unique:users",
            "fullname" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
        ])->validate();

        User::create([
            "username" => $request->username,
            "fullname" => $request->fullname,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => 1,
        ]);

        return redirect()->route("admin_login");
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }

    public function loginFrontend()
    {
        return view("frontend.pages.auth.login");
    }

    public function loginClient(Request $request)
    {
        $field = filter_var($request->input('login_type'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('login_type')]);

        if (!Auth::attempt($request->only($field, 'password'))) {
            // RateLimiter::hit($request->throttleKey());
     
            throw ValidationException::withMessages([
                'login_type' => trans('auth.failed'),
                // 'password' => trans('auth.failed'),
            ]);
        }

        $request->session()->regenerate();
  
        return redirect()->route('home');
    }

    public function regisFrontend()
    {
        return view("frontend.pages.auth.register");
    }

    public function saveRegisterUser(Request $request)
    {
        Validator::make($request->all(), [
            "username" => "required|unique:users",
            "fullname" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
        ])->validate();

        User::create([
            "username" => $request->username,
            "fullname" => $request->fullname,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => 2,
        ]);

        return redirect()->route("login_user");
    }
}
