<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::latest()->get();
        return view('department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',

        ]);


        if ($request->hasFile('image') && $request->image != null) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'department'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $department->image = $final_name;
        }

        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',

        ]);


        if ($request->hasFile('image') && $request->image != null) {

            if ($department->image != null) {
                unlink(public_path('uploads/'.$department->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'department'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $department->image = $final_name;
        }

        $department->name = $request->name;
        $department->description = $request->description;
        $department->update();

        return redirect()->route('departments.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $department = Department::findOrFail($id);
        if ($department->image != null) {
            unlink(public_path('uploads/'.$department->image));
        }

        $department->user->delete();
        $department->delete();

        return redirect()->back();

    }
}
