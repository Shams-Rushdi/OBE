<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $course = Course::get();
        return view('Courses.index',compact('course'));
    }
    
    public function courseindexpage()
    {
        $course_categories = CourseCategory::all();
        $courses = Course::latest()->get();
        return view('Courses.courseindex', compact('courses', 'course_categories'));
    }

    public function create()
    {
        $category = CourseCategory::get();
        return view('Courses.create', compact('category'));
    }


    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' =>'required|string|max:255',
            'description' =>'string|max:512',
            'youtube_url' =>'string|max:512'
        ]);

        if ($request->hasFile('image') && $request->image != null) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'course'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $course->image = $final_name;
        }
        
        $course->title = $request->title;
        $course->course_category_id = $request->course_category_id;
        $course->description = $request->description;
        $course->youtube_url = $request->youtube_url;
        $course->save();

        return redirect()->route('course.index');
    }


    public function show(Course $course)
    
    {
        $category = CourseCategory::all();
        return view('Courses.show',compact('course','category'));
    }


    public function edit($id)
    {
        $category = CourseCategory::get();
        $course = Course::findOrFail($id);
        return view('Courses.edit',compact('course','category'));
    }


    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'title' =>'required|string|max:255',
            'description' =>'string|max:512',
            'youtube_url' =>'string|max:512'
        ]);

        if ($request->hasFile('image') && $request->image != null) {
            if ($course->image != null) {
                unlink(public_path('uploads/'.$course->image));
            }
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'course'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $course->image = $final_name;
        }
        
        $course->title = $request->title;
        $course->description = $request->description;
        $course->youtube_url = $request->youtube_url;
        $course->course_category_id = $request->course_category_id;
        $course->update();
        return redirect()->route('course.index');
    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back();   
    }
}
