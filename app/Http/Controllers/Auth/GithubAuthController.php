<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
// use Illuminate\Http\Request;

class GithubAuthController extends Controller
{
    public function redirect()
    {
        try {
            return Socialite::driver('github')->redirect();
        } catch (\Exception $e) {
            return redirect('profile')->with('error', 'Authentication failed');
        }
    }

    public function callback()
    {
        $github_user = Socialite::driver('github')
        ->user();

        $user = User::firstOrCreate(
            ['email' => $github_user->getEmail()],
            [
                'name' => $github_user->getName(),
                'email' => $github_user->getEmail(),
                'phone' => null,
                'password' => Hash::make(Str::random(14))
            ]
        );

        Auth::login($user);
        return redirect('profile')->with('success','Join seccessffully with github ⭐');
    }
}