<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showAdminDashboard()
    {
        return view('Roles.admin');
    }

    public function showUsersDashboard()
    {
        $users = User::all();
        return view('Extends.users', ['users' => $users]);
    }

    public function showSellersDashboard(){
        $sellers = User::where('role','seller')->get();
        return view('Extends.sellers', ['sellers' => $sellers]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully');
    }

 
    public function updateUserRole(Request $request, $id){
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('users')->with('success', 'User role updated successfully');
    }
}