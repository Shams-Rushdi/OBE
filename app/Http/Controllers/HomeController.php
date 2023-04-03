<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Job;
use App\Models\User;
use App\Models\Department;
use App\Models\Course;
use App\Models\Workshop;
use Illuminate\Http\Request;
Use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $teacher_role = Role::findByName('Teacher');
        $teacher = $teacher_role->users()->count();

        $admin_role = Role::findByName('Admin');
        $admin = $admin_role->users()->count();

        $alumni_role = Role::findByName('Alumni');
        $alumni = $alumni_role->users()->count();

        $student_role = Role::findByName('Student');
        $student = $student_role->users()->count();

        $department = Department :: count();

        $jobs = Job :: count();
        $blogs = Blog :: count();
        $courses = Course :: count();
        $workshops = Workshop :: count();


        
        return view('home',compact('admin','student','alumni','teacher','department','jobs','blogs','courses','workshops'));
    }

    public function student()
    {
        return "hello";
    }
}
