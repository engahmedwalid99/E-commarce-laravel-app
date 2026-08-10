<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class FacebookeController extends Controller
{
    public function redirect()
    {
        try {
            $user = Socialite::driver()->redirect();
            return $user;
        } catch (\Exception $e) {
            // redirect to home with error becouse i done't have facebooke account for developer
            return redirect('profile')->with('error', 'Authentication failed');
        }
    }

    public function callback()
    {
        // $facebook_user = Socialite::driver()->user();
        // $user = User::firstOrCreate(
        //     ['email' => $facebook_user->getEmail()],
        //     [
        //         'name' => $facebook_user->getName(),
        //         'email' => $facebook_user->getEmail(),
        //         'email_verified_at' => now(),
        //         'phone' => null,
        //         'password' => Hash::make(Str::random(14))
        //     ]
        // );

        // Auth::login($user);
        // return redirect()->route('profile')->with('success','Join seccessffully with Facebook');
        return redirect()->route('home')->with('error','Error with Facebook');
    }
}