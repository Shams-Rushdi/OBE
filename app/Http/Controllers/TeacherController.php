<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:teacher list', ['only' => ['index','show']]);
         $this->middleware('permission:teacher create', ['only' => ['create','store']]);
         $this->middleware('permission:teacher edit', ['only' => ['edit','update']]);
         $this->middleware('permission:teacher delete', ['only' => ['destroy']]);
   }

    public function index()
    {
        $department=Department::pluck('name', 'id')->toArray();
        $role = Role::findByName('Teacher');
        $teacher = $role->users;
        return view('TeacherPanel.list', compact('teacher', 'department'));
    }

    public function search(Request $request)
    {
        $role = Role::findByName('Admin');
        $departments=Department::pluck('name', 'id')->toArray();
        // $admin = $role->users;
        //dd($request->all());
        $department = $request->department_id;
        $teacher    = $request->teacher_id;

        $query = User::query();
        //DB::table('users')->select('id', 'name', 'email', 'phone_number', 'status', 'teacher_id');

        if ($department) {
            $query->where('department_id', $department);
        }

        if ($teacher) {
            $query->where('teacher_id', $teacher);
        }

         $admin = $query->whereHas('roles', function ($query) {
             $query->where('name', 'Teacher');
         })->get();

        //$admin = $query->get();



        return view('TeacherPanel.searchlist', compact('departments', 'admin'));
    }

    public function show($id){
        $teacher = User::findOrFail($id);
        return view('TeacherPanel.show', compact('teacher'));
    }

    public function create()
    {
        $departments = Department::get();
        return view('TeacherPanel.create', compact('departments'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            "name"=>"required|max:50|min:3",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $admin = new User();
        $admin->teacher_id = $request->teacher_id;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request['password']);
        $admin->phone_number = $request->phone_number;
        $admin->department_id = $request->department_id;
        $admin->gender = $request->gender;
        $admin->present_address = $request->present_address;
        $admin->permanent_address = $request->permanent_address;
        $admin->dob = $request->dob;
        $admin->status = 'Active';
        $admin->save();
        $admin->assignRole('Teacher');
        return redirect()->route('teacher.index')->with('success', 'Teacher has been Created successfully');
    }

    public function edit(User $teacher)
    {
        return view('TeacherPanel.edit', compact('teacher'));
    }
    public function update(Request $request, User $teacher)
    {
        $this->validate($request, [
            "name"=>"required|max:50|min:3",
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $admin = User::where('id', $request->id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->department_id = $request->department_id;
        $admin->teacher_id = $admin->teacher_id;
        $admin->phone_number = $request->phone_number;
        $admin->save();
        return redirect()->route('teacher.index')->with('success', 'Teacher has been updated successfully');
    }

    public function destroy(User $teacher)
    {
        $teacher->delete();
        return back();
    }
}
