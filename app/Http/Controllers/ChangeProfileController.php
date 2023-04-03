<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use File;

class ChangeProfileController extends Controller
{
    public function ProfileUpdate(Request $req){
        $id =  $req->id;
        $user = User :: where ('id',$id)->first();
        return view ('auth.changeprofile',compact('user'));

    }
    
    public function ProfileUpdateSubmit(Request $request){
        
        $user = User::where ('id',$request->id)->first();
        // $this->validate($req,
        // [
            //     "name"=>"required|max:50|min:3",
        //     "email"=>"required|email|unique:users,email",
        //     "phonenumber"=>'required',
        //     "address"=>'required'   
        // ],
        
        // [
            //     "name.required"=>"Please provide your name",
        //     "name.max"=>"Name should not exceed 50 characters",  
        // ]);
        if ($request->hasFile('profile_image') && $request->profile_image != null) {
            if ($user->profile_image != null) {
                # code...
                unlink(public_path('images/profile/'.$user->profile_image));
            }
            
            $ext = $request->file('profile_image')->extension();
            $final_name = time().'-'.uniqid().'-'.'profile'.'.'.$ext;

            $request->file('profile_image')->move(public_path('images/profile/'), $final_name);
            
            $user->profile_image = $final_name;
        }
        if ($request->hasFile('cover_image') && $request->cover_image != null) {
            if ($user->cover_image != null) {
                # code...
                unlink(public_path('images/profile/'.$user->cover_image));
            }
            
            $ext = $request->file('cover_image')->extension();
            $final_name = time().'-'.uniqid().'-'.'profile'.'.'.$ext;

            $request->file('cover_image')->move(public_path('images/profile/'), $final_name);
            
            $user->cover_image = $final_name;
        }
        //dd($request->all());
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->present_address = $request->present_address;
        $user->save();
        session()->flash('msg','successfull');
        return redirect()->back();  
        }

        public function StudentProfileUpdate(Request $req){
            $id =  $req->id;
            $user = User :: where ('id',$id)->first();
            return view ('StudentPanel.profile',compact('user'));
    
        }
        
        public function StudentProfileUpdateSubmit(Request $request){
            
            $user = User::where ('id',$request->id)->first();
            // $this->validate($req,
            // [
                //     "name"=>"required|max:50|min:3",
            //     "email"=>"required|email|unique:users,email",
            //     "phonenumber"=>'required',
            //     "address"=>'required'   
            // ],
            
            // [
                //     "name.required"=>"Please provide your name",
            //     "name.max"=>"Name should not exceed 50 characters",  
            // ]);
            if ($request->hasFile('profile_image') && $request->profile_image != null) {
                if ($user->profile_image != null) {
                    # code...
                    unlink(public_path('images/profile/'.$user->profile_image));
                }
                
                $ext = $request->file('profile_image')->extension();
                $final_name = time().'-'.uniqid().'-'.'profile'.'.'.$ext;
    
                $request->file('profile_image')->move(public_path('images/profile/'), $final_name);
                
                $user->profile_image = $final_name;
            }
            if ($request->hasFile('cover_image') && $request->cover_image != null) {
                if ($user->cover_image != null) {
                    # code...
                    unlink(public_path('images/profile/'.$user->cover_image));
                }
                
                $ext = $request->file('cover_image')->extension();
                $final_name = time().'-'.uniqid().'-'.'profile'.'.'.$ext;
    
                $request->file('cover_image')->move(public_path('images/profile/'), $final_name);
                
                $user->cover_image = $final_name;
            }
            //dd($request->all());
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->present_address = $request->present_address;
            $user->save();
            session()->flash('msg','successfull');
            return redirect()->back();   
            }
}
