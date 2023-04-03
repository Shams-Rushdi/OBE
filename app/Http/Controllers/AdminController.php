<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
Use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use HasRoles;

class AdminController extends Controller
{
    public function index(Request $request) 
    {
        $role = Role::findByName('Admin');
        $department=Department::pluck('name','id')->toArray();
        $admin = $role->users;
        return view ('AdminPanel.list',compact('admin','department'));
    }

    public function search(Request $request)
    {
        $role = Role::findByName('Admin');
        $departments=Department::pluck('name','id')->toArray();
       // $admin = $role->users;
        //dd($request->all());
        $department = $request->department_id;
        $student    = $request->student_id;
        
       // $query = DB::table('users')->select('id','name', 'email', 'phone_number', 'status');
       
       $query = User::query();


        if ($department) {
            $query->where('department_id', $department);
        }

        if ($student) {
            $query->where('student_id', $student);
        }

        $admin = $query->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        //$admin = $query->get();


        
        return view('AdminPanel.searchlist',compact('departments','admin'));
    }

    public function create()
    {
        return view ('AdminPanel.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            "name"=>"required|max:50|min:3",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request['password']);
        $admin->phone_number = $request->phone_number;
        $admin->save();
        $admin->assignRole('Admin');
        return redirect()->route('admin.index')->with('success','Admin has been deleted successfully');
    }

    public function edit(User $admin)
    {
        return view ('AdminPanel.edit',compact('admin'));
    }
    public function update(Request $request, User $admin)
    {

            $this->validate($request, [
                "name"=>"required|max:50|min:3",
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);

            $admin = User::where ('id',$request->id)->first();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone_number = $request->phone_number;
            $admin->save();
            return redirect()->route('admin.index')->with('success','admin has been updated successfully');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
        return back();
    }


}
