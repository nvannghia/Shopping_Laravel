<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if (Auth::check()) {
            return redirect()->route('categories.index');
        }
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect('welcome');
        } else
            return redirect()->to('/admin')->with('error', "Đăng nhập thất bại!");
    }

    public function logout()
    {
        Auth::logout();
        return view('login');
    }
}
