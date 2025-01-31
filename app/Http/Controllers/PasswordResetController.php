<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\PasswordResetBroker;
use Illuminate\Support\Facades\PasswordBroker;
use Illuminate\Support\Str;
use App\Models\User;

class PasswordResetController extends Controller
{
public function showForgotPassword(){
return view('auth.forgot-password');
}


public function forgotPassword(Request $request){
$request->validate(['email'=>['required','email']]);
//send email
 $status=Password::sendResetLink($request->only('email'));

 if($status === Password::RESET_LINK_SENT){
     return back()->with('success','Password reset link sent to your email');
 }

return back()->withErrors(['email'=>$status])
             ->withInput($request->only('email'));
}



public function showResetPassword(){
    return view('auth.reset-password');
}



public function resetPassword(Request $request)
{
   $request->validate([
       'email'=>['required','email'],
       'password'=>['required','confirmed','string'],
       'token'=>['required'],
       \Illuminate\Validation\Rules\Password::min(8)
           ->max(24)
                   ->numbers()
                   ->mixedCase()
                   ->symbols()
                   ->uncompromised()
   ]);

    $status = Password::reset(
        $request->only(['email', 'password', 'password_confirmation', 'token']),
        function (User $user, $password) {
        $user->forceFill(['password' => Hash::make($password)])
        ->setRememberToken(\Str::random(60));
        $user->save();
        event(new PasswordReset($user));
    });
    if($status === Password::PASSWORD_RESET){
        return redirect()->route('login')->with('success','Password reset successfully');

        }
        return back()->withErrors(['email' => __($status)]);
}
}

