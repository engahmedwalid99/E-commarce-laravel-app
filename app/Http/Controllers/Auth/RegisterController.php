<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\sendMailWheneRegister;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke()
    {
        return view('Auth.Register');
    }

    public function create_account(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'email_verified_at' => null,
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        Mail::to($user->email)->send(new sendMailWheneRegister($user));

        $urls = [
            'user' => 'user-dashboard',
            'seller' => 'seller-dashboard',
            'admin' => 'admin-dashboard'
        ];

        return redirect()->intended($urls[$user->role])->with('success', "Logged in successfully as {$user->role}");
    }
}