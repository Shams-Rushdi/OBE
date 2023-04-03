<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Department;
use App\Models\Event;
use App\Models\Job;
use App\Models\User;
use App\Models\Course;
use App\Models\Workshop;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{

    public function Dashboard()
    {
        $blogs = Blog::with('blogsCategory')->latest()->limit(4)->get();
        $blogs_all =Blog::count();
        $events = Event::latest()->limit(4)->get();
        $events_all =Event::count();
        $jobs = Job::latest()->limit(4)->get();
        $jobs_all =Job::count();
        $workshops = Workshop::latest()->limit(4)->get();
        $workshops_all =Workshop::count();
        $courses = Course::latest()->limit(4)->get();
        $course_all = Course::count();
        $departments = Department::pluck('name','id')->toArray();
        return view("StudentPanel.index", compact('blogs','departments', 'events', 'jobs', 'workshops', 'workshops_all', 'blogs_all', 'jobs_all', 'events_all', 'courses', 'course_all'));
    }

    public function index()
    {
        $department=Department::pluck('name','id')->toArray();
        $role = Role::findByName('Student');
        $student = $role->users;
        return view('StudentPanel.list', compact('student','department'));
    }


    public function search(Request $request)
    {
        $role = Role::findByName('Student');
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
        $student = $query->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->get();
        //$student = $query->get();
        return view('StudentPanel.searchlist',compact('departments','student'));
    }

    public function show($id){
        $student = User::findOrFail($id);
        return view('StudentPanel.show', compact('student'));
    }

    public function create()
    {
        $department=Department::pluck('name', 'id')->toArray();
        return view('StudentPanel.create', compact('department'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            "name"=>"required|max:50|min:3",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $student = new User();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request['password']);
        $student->phone_number = $request->phone_number;
        $student->gender = $request->gender;
        $student->present_address = $request->present_address;
        $student->department_id = $request->department_id;
        $student->batch_id = $request->batch_id;
        $student->permanent_address = $request->permanent_address;
        $student->dob = $request->dob;
        $student->facebook = $request->facebook;
        $student->twitter = $request->twitter;
        $student->instagram = $request->instagram;
        $student->linkedin = $request->linkedin;
        $student->student_id = $request->student_id;
        $student->save();
        $student->assignRole('Student');
        return redirect()->route('student.index')->with('success', 'Student has been deleted successfully');
    }

    public function edit(User $student)
    {
        //$department=Department::pluck('name', 'id')->toArray();
        $department = Department::all();
        return view('StudentPanel.edit', compact('student','department'));
    }
    public function update(Request $request, User $student)
    {
        $this->validate($request, [
            "name"=>"required|max:50|min:3",
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $student = User::where('id', $request->id)->first();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->department_id = $request->department_id;
        $student->phone_number = $request->phone_number;
        $student->dob = $request->dob;
        $student->present_address = $request->present_address;
        $student->batch_id = $request->batch_id;
        $student->permanent_address = $request->permanent_address;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student has been updated successfully');
    }

    public function ProfileUpdate(Request $req)
    {
        $departments = Department::latest()->get();
        $user = Auth::user()->id;
        $all_users = User::where('id', '!=', Auth::user()->id)->filter(request(['name','department_id','batch_id','student_id']))->limit(4)->get();
        $students = User::findOrFail($user);
        return view('StudentPanel.profile', compact('user', 'students', 'all_users','departments'));
    }
    public function ProfileUpdateModal(Request $req)
    {
        $user = Auth::user()->id;
        //dd($students);
        $students = User::findOrFail($user);
        return view('StudentPanel.profileModal', compact('user', 'students'));
    }

    public function ProfileUpdateSubmit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
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
        //dd($request->all());
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
        $user->dob = $request->dob;
        $user->bio = $request->bio;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;
        $user->save();
        session()->flash('msg', 'successfull');
        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function destroy(User $student)
    {
        $student->delete();
        return back();
    }
}
