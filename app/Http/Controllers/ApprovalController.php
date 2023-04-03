<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Blog;
use App\Models\Category;

class ApprovalController extends Controller

{
    public function job()
    {
        $jobs = Job::where('status', 0)->get();
        return view('Approval.jobs', compact('jobs'));
    }
    
    
    public function jobView($id)
    {
    	$job = Job::find($id);
    	
    	
        return view('Approval.job-view', compact('job'));
    }
    
    
    public function jobUpdate(Request $request, $id)
    {
    	$job            = Job::find($id);
    	$job->status    = $request->status;
    	$job->save();
    	
        return redirect()->route('jobs.index');
    }
    
    
    public function blog()
    {
        $blogs = Blog::where('status', 0)->get();
        return view('Approval.blogs', compact('blogs'));
    }
    
    
    
    public function blogView($id)
    {
    	$blog = Blog::find($id);
    	$categories = Category::all();
        return view('Approval.blog-view', compact('blog', 'categories'));
    }
    
    
    public function blogUpdate(Request $request, $id)
    {
    	$blog            = Blog::find($id);
    	$blog->status    = $request->status;
    	$blog->save();
    	
        return redirect()->route('blogs.index');
    }


}
