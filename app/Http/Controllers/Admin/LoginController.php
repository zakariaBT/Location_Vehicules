<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function __construct()
    {
    $this->middleware('guest:admin')->except('logout');
    }

    public function index(){

        return view('Admin.Account.login');
    }
    public function check(Request $request){
         //validation
         $this->validate($request , [
             'email' => 'required |email|exists:admins',
             'password' => 'required | max:30',
            ]);
            if(Auth::guard('admin')->attempt($request->only('email','password'))){
                return redirect()->route('dashboard');
            };
            return redirect()->back()->with('login','email or password incorrect !');
    }

    public function logout(){
        auth('admin')->logout();
        return redirect()->route('home');
    }
}
