<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomerLoginController extends Controller
{
    public function loginCustomer()
    {
        if (Auth::check()) {
            return redirect()->route('home.index');
        }
        return view('frontend.login_register.login');
    }

    public function postLoginCustomer(Request $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('home.index');
        } else
            return redirect()->route('customer-login')->with('error', "Login failed!");
    }

    public function registerCustomer()
    {
        return view('frontend.login_register.register');
    }

    public function postRegisterCustomer(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();
            return redirect()->route('customer-login')->with('msg', 'Registered successfully, try logging in.');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Message: ' . $ex->getMessage() . ', Line: ' . $ex->getLine());
        }
    }

    public function logoutCustomer()
    {
        Auth::logout();
        return redirect()->route('customer-login');
    }
}
