<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:job-category list', ['only' => ['index','show']]);
          $this->middleware('permission:job-category create', ['only' => ['create','store']]);
          $this->middleware('permission:job-category edit', ['only' => ['edit','update']]);
          $this->middleware('permission:job-category delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $job_categories = JobCategory::latest()->get();
        return view('jobCategory.index',compact('job_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, JobCategory $jobCategory)
    {
        $request->validate([
            'name' => 'string|required'
        ]);

        $jobCategory->name = $request->name;
        $jobCategory->save();

        return redirect()->route('jobcategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $job_category = JobCategory::find($id);
        $job_categories = JobCategory::all();
        return view('jobCategory.show', compact('job_category','job_categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job_category = JobCategory::findOrFail($id);
        return view('jobCategory.edit', compact('job_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jobCategory = JobCategory::findOrFail($id);
        $request->validate([
            'name' => 'string|required'
        ]);

        $jobCategory->name = $request->name;
        $jobCategory->update();

        return redirect()->route('jobcategories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jobCategory = JobCategory::findOrFail($id);
        $jobCategory->delete();

        return redirect()->back();
    }
}
