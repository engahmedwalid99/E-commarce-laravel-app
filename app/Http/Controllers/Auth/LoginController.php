<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendMailWheneLogin;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('Auth.Login');
    }

    public function check_data_to_login(LoginRequest $request)
    {
        $remember = $request->boolean('remember');
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials, $remember)) {
        //     Mail::to(Auth::user()->email)->send(new sendMailWheneLogin());
        //     $request->session()->regenerate();
        //     return redirect()->intended('profile')
        //     ->with('success', 'Logged in successfully');

        // }
        // return back()->with('error', 'Invalid credentials!');

        // -----------------------------------------------------

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Wrong password');
        }

        Auth::login($user, $remember);
        Mail::to($user->email)->send(new sendMailWheneLogin(Auth::user()));

        $urls = [
            'user' => 'user-dashboard',
            'seller' => 'seller-dashboard',
            'admin' => 'admin-dashboard',
        ];
        return redirect()->intended($urls[$user->role ?? 'profile'])
        ->with('success', 'Logged in successfully');
    }
}