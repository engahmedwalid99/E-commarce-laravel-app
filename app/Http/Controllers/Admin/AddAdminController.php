<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddAdminRequest;
use App\Mail\InviteToAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AddAdminController extends Controller
{
    public function showFormAddAdmin()
    {
        return view('Extends.addAdmin');
    }

    public function addAdmin(AddAdminRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role' => 'admin',
            'password' => Hash::make($data['name']),
        ]);
        Mail::to($data['email'])->send(new InviteToAdmin($user));
        return redirect()->route('users')->with('success', 'Admin added successfully');
    }
}