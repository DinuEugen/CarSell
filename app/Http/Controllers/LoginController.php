<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
       $credentials=$request->validate([
        'email' =>[ 'required','email'],
        'password' => ['required','string'],
       ]);

       if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()-> intended(route('home'))
        ->with('success','Welcome back');
       }
       return redirect()->back()->withErrors([
        'email'=>'The provided credentials do not match our records'
       ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
        }

}
