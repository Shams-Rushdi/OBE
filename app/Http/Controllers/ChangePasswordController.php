<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function PasswordUpdate(Request $req){
        $id =  $req->id;
        $user = User :: where ('id',$id)->first();
        return view ('auth.changepassword',compact('user'));

    }

    public function PasswordUpdateSubmit(Request $request){
       $request->validate([
        'old_password' => 'required',
        'password' => 'required|min:8',
        'confirm_password' => 'required|min:8|same:password',
    ]);
        $hasPass = User:: find($request->id);
        if (Hash::check($request->old_password, $hasPass->password)) {
            $hasPass->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with("status", "Password Change");
        } else {
            return back()->with("error", "Password did not matched");
        }
    }
}
