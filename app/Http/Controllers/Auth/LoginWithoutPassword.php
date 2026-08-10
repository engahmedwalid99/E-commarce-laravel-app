<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginByLink;
use App\Mail\SendLoginWithoutPasswordEmail;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Http\Request;

class LoginWithoutPassword extends Controller
{
    public function Login_Without_Password(){
        return view('Auth.LoginWithoutPassword');
    }

    public function send_link(LoginByLink $request)
    {
        $request->validated();
        $user = User::where('email', $request->email)->first();
        $url = route('Login_handler', ['user' => $user->id]);
        Mail::to($user->email)->send(new SendLoginWithoutPasswordEmail($url));
        return back()->with('success','Check your inbox ⭐');
    }

    public function login_mailer(Request $request, User $user)
    {
        Auth::login($user);
        return redirect('profile')->with('success','Loged in');
    }
}