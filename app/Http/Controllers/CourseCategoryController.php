<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
   
    public function index()
    {
        
        $coursecategory = CourseCategory::all();
        return view('CoursesCategory.index', compact('coursecategory'));
    }

 
    public function create()
    {
        return view('CoursesCategory.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'max:255'
        ]);

        $courseCategory = new CourseCategory();
        $courseCategory->name = $request->name;
        $courseCategory->description = $request->description;
        $courseCategory->save();

        return redirect()->route('coursecategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseCategory $courseCategory)
    {
       $coursecategories = CourseCategory::all();
       return view('CoursesCategory.show', compact('courseCategory', 'coursecategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coursecategory = CourseCategory::findOrFail($id);
        return view('coursecategory.edit', compact('coursecategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'max:255'
        ]);

        $courseCategory = CourseCategory::findOrFail($id);
        $courseCategory->name = $request->name;
        $courseCategory->description = $request->description;
        $courseCategory->update();

        return redirect()->route('coursecategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $courseCategory = CourseCategory::findOrFail($id);
        $courseCategory->delete();

        return redirect()->route('coursecategory.index');
    }
}
