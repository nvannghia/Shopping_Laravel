<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if (Auth::check()) {
            return redirect('home');
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
            return redirect()->to('home');
        } else
            return redirect()->to('/admin')->with('error', "Đăng nhập thất bại!");
    }
}
