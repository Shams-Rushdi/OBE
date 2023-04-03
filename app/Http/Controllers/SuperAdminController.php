<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    public function index()
    {
        //$superadmin = User :: where('role','SuperAdmin')->latest()->get();
        $role = Role::findByName('SuperAdmin');
        $superadmin = $role->users;
        return view ('SuperAdminPanel.list',compact('superadmin'));
    }
    public function create()
    {
        return view ('SuperAdminPanel.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            "name"=>"required|max:50|min:3",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $superadmin = new User();
        $superadmin->name = $request->name;
        $superadmin->email = $request->email;
        $superadmin->password = Hash::make($request['password']);
        $superadmin->phone_number = $request->phone_number;
        $superadmin->save();
        $superadmin->assignRole('SuperAdmin');
        return redirect()->route('superadmin.index')->with('success','SuperAdmin has been deleted successfully');
    }

    public function edit(User $superadmin)
    {
        return view ('SuperAdminPanel.edit',compact('superadmin'));
    }
    public function update(Request $request, User $superadmin)
    {

            $this->validate($request, [
                "name"=>"required|max:50|min:3",
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);

            $superadmin = User::where ('id',$request->id)->first();
            $superadmin->name = $request->name;
            $superadmin->email = $request->email;
            $superadmin->phone_number = $request->phone_number;
            $superadmin->save();
            return redirect()->route('superadmin.index')->with('success','Super Admin has been updated successfully');
    }

    public function destroy(User $superadmin)
    {
        $superadmin->delete();
        return back();
    }

}
