<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rules\Password;


class SignupController extends Controller
{
    public function create()
    {
        return view('auth.signup');
    }


    public function store(Request $request)
    {
       $request-> validate([
           'name' => ['required','string','max:255'],
           'email' => ['required','email','unique:users,email'],
           'phone'=>['required','string','max:255','unique:users,phone'],
           'password' =>['required','string','confirmed',
           Password::min(8)
           -> max(24)
           -> mixedCase()
           -> numbers()
           -> symbols()
           -> uncompromised()],

       ]);

$user=User::create([
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'password' => Hash::make($request->password),
]);
Auth::login($user);
return redirect()-> route('home')
-> with('success','User created successfully');
    }
}
