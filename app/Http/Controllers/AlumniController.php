<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use App\Models\Plan;
use App\Models\JobCategory;
use App\Models\User;
use Auth;
Use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    public function Dashboard(){
        $department=Department::pluck('name','id')->toArray();
        return view ('AlumniPanel.index','department');
    }

    public function index()
    {
        $department=Department::pluck('name','id')->toArray();
        $role = Role::findByName('Alumni');
        $alumni = $role->users;
        return view ('AlumniPanel.list',compact('alumni','department'));
    }

    public function search(Request $request)
    {
        $role = Role::findByName('Admin');
        $departments=Department::pluck('name','id')->toArray();
       // $admin = $role->users;
        //dd($request->all());
        $department = $request->department_id;
        $student    = $request->student_id;

        //$query = DB::table('users')->select('id','name', 'email', 'phone_number', 'status');

        $query = User::query();

        if ($department) {
            $query->where('department_id', $department);
        }

        if ($student) {
            $query->where('student_id', $student);
        }

        $alumni = $query->whereHas('roles', function ($query) {
            $query->where('name', 'alumni');
        })->get();

        //$admin = $query->get();
        return view('AlumniPanel.searchlist',compact('departments','alumni'));
    }
    public function create()
    {
        $department=Department::pluck('name','id')->toArray();
        return view ('AlumniPanel.create',compact('department'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            "name"=>"required|max:50|min:3",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $alumni = new User();
        $alumni->name = $request->name;
        $alumni->email = $request->email;
        $alumni->password = Hash::make($request['password']);
        $alumni->phone_number = $request->phone_number;
        $alumni->department_id = $request->department_id;
        $alumni->gender = $request->gender;
        $alumni->present_address = $request->present_address;
        $alumni->permanent_address = $request->permanent_address;
        $alumni->student_id = $request->student_id;
        $alumni->batch_id = $request->batch_id;
        $alumni->designation_letter = $request->designation_letter;
        $alumni->company_name = $request->company_name;
        $alumni->experience = $request->experience;
        $alumni->dob = $request->dob;
        $alumni->facebook = $request->facebook;
        $alumni->twitter = $request->twitter;
        $alumni->instagram = $request->instagram;
        $alumni->linkedin = $request->linkedin;
        $alumni->save();
        $alumni->assignRole('Alumni');
        return redirect()->route('alumni.index')->with('success','Alumni has been deleted successfully');
    }

    public function show($id) {
        $alumni = User::findOrFail($id);
        return view('AlumniPanel.show',compact('alumni'));
    }

    public function edit($id)
    {
        $department = Department::all();
        $alumni = User::find($id);
        return view ('AlumniPanel.edit',compact('alumni','department'));
    }
    public function update(Request $request, $id)
    {

            $this->validate($request, [
                "name"=>"required|max:50|min:3",
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
            //$alumni = User::where ('id',$request->id)->first();
            $alumni = User::find($id);
            $alumni->name = $request->name;
            $alumni->email = $request->email;
            $alumni->phone_number = $request->phone_number;
            $alumni->present_address = $request->present_address;
            $alumni->permanent_address = $request->permanent_address;
            $alumni->department_id = $request->department_id;
            $alumni->student_id = $request->student_id;
            $alumni->designation_letter = $request->designation_letter;
            $alumni->company_name = $request->company_name;
            $alumni->experience = $request->experience;
            $alumni->dob = $request->dob;
            $alumni->save();
            return redirect()->route('alumni.index')->with('success','Alumni has been updated successfully');
    }

    public function ProfileUpdate(Request $request, $id)
    {

            $this->validate($request, [
                "name"=>"required|max:50|min:3",
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
            //$alumni = User::where ('id',$request->id)->first();
            $alumni = User::find($id);
            $alumni->name = $request->name;
            $alumni->phone_number = $request->phone_number;
            $alumni->present_address = $request->present_address;
            $alumni->permanent_address = $request->permanent_address;
            $alumni->designation_letter = $request->designation_letter;
            $alumni->company_name = $request->company_name;
            $alumni->experience = $request->experience;
            $alumni->dob = $request->dob;
            $alumni->save();
            return redirect()->back()->with('success','Alumni has been updated successfully');
    }

    public function ProfileUpdate2(Request $req){
        $departments = Department::latest()->get();
        $user = Auth::user()->id;
        $all_users = User::where('id', '!=', Auth::user()->id)->filter(request(['name','department_id','batch_id','student_id']))->limit(4)->get();

        //dd($students);
        $students = User::findOrFail($user);
        return view ('AlumniPanel.profile',compact('user','students', 'all_users','departments'));

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
        $user->permanent_address = $request->permanent_address;
        $user->designation_letter = $request->designation_letter;
        $user->company_name = $request->company_name;
        $user->experience = $request->experience;
        $user->dob = $request->dob;
        $user->bio = $request->bio;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;
        $user->save();
        session()->flash('msg','successfull');
        return redirect()->back();
        }

        public function destroy($id)
        {
            $alumni = User::find($id);
            $alumni->delete();
            return back();
        }



}
