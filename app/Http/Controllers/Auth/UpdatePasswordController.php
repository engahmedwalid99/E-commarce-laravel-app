<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('Auth/UpdatePassword');
    }
    
    public function confirem_update_password(UpdatePassword $request){
        $user = Auth::user();
        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            return redirect('profile')->with('success','Your password updated successfully ⭐');
        }
        return redirect('profile')->with('error','Invalid password');
    }
}