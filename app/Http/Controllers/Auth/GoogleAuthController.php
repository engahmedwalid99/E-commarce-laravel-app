<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(){
        try {
            return Socialite::driver("google")->redirect();
        } catch (\Exception $e) {
            return redirect('profile')->with('error', 'Authentication failed');
        }
    }
    public function callback(){
        $google_user = Socialite::driver("google")->user();
        $user = User::firstOrCreate(
            ['email' => $google_user->getEmail()],
            [
                'name' => $google_user->getName(),
                'email' => $google_user->getEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make(Str::random(14)),
            ]
        );
        Auth::login($user);
        return redirect()->route('profile')->with('success','Join seccessffully with google');
    }
}
