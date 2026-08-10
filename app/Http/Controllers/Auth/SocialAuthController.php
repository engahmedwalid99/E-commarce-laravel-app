<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class SocialAuthController extends Controller
{
    public function redirect(string $driver){
        if(!in_array($driver, ['facebook', 'google', 'github'])){
            return redirect()->route('login')->with('error','Invalid Driver');
        }

        try{
            return Socialite::driver($driver)->redirect();
        }catch(\Exception $e){
            return redirect()->route('login')->with('error','Authentication failed');
        }
    }

    public function callback(string $driver){
        if(!in_array($driver, ['facebook', 'google', 'github'])){
            return redirect()->route('login')->with('error','Invalid Driver');
        }

        $google_user = Socialite::driver($driver)->user();

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
        return redirect()->route('profile')->with('success', 'Join seccessffully with ' . $driver);
    }
}