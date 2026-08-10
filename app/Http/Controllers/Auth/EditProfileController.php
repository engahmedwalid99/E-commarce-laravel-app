<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EditProfileData;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function __invoke(EditProfileData $request)
    {
        $user = Auth::User();
        $request->validated();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        return redirect('profile')->with("success","Profile updated successffuly ⭐");
    }
}