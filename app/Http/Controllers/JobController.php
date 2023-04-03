<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:job list', ['only' => ['index','show']]);
        $this->middleware('permission:job create', ['only' => ['create','store']]);
        $this->middleware('permission:job edit', ['only' => ['edit','update']]);
        $this->middleware('permission:job delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $jobs = Job::with('jobCategory')->latest()->get();
        return view('job.index', compact('jobs'));
    }
    public function approval()
    {
        $approvals = Job::all();
        return view('job.approval', compact('approvals'));
    }

    public function jobindexpage()
    {
        $job_categories = JobCategory::all();
        $jobs = Job::with('jobCategory')->latest()->paginate(10);
        return view('job.jobIndexPage', compact('jobs', 'job_categories'));
    }

    public function myjob()
    {
        $job_categories = JobCategory::all();
        $jobs = Job::where('user_id', Auth::user()->id)->with('jobCategory')->latest()->paginate(10);

        return view('job.myjobIndex', compact('jobs', 'job_categories'));
    }
    public function myjobStore(Request $request, Job $job)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'job_location' => 'required|string',
            'contact_email' => 'required|string|email',
            'web_url' => 'nullable|string',
            'phone' => 'nullable|string',
            'deadline' => 'nullable|date',
            'salary' => 'nullable|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            # code...
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'job'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $job->image = $final_name;
        }
        $job->company_name = $request->company_name;
        $job->job_title = $request->job_title;
        $job->job_category_id = $request->job_category_id;
        $job->description = $request->description;
        $job->job_location = $request->job_location;
        $job->contact_email = $request->contact_email;
        $job->contact_email = $request->contact_email;
        $job->web_url = $request->web_url;
        $job->phone = $request->phone;
        $job->deadline = $request->deadline;
        $job->salary = $request->salary;
        $job->user_id = Auth::user()->id;

        $job->save();
        return redirect()->back();
    }

    public function myJobDetails($id)
    {
        $job_applications = JobApplication::where('job_id', $id)->get();
        $job = Job::findOrFail($id);
        return view('job.myjobdetails', compact('job', 'job_applications'));
    }

    public function card()
    {
        $jobs = Job::latest()->get();
        return view('job.card', compact('jobs'));
    }

    public function create()
    {
        $job_categories = JobCategory::all();
        return view('job.create', compact('job_categories'));
    }


    public function store(Request $request, Job $job)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'job_location' => 'required|string',
            'contact_email' => 'required|string|email',
            'web_url' => 'nullable|string',
            'phone' => 'nullable|string',
            'deadline' => 'nullable|date',
            'salary' => 'nullable|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            # code...
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'job'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $job->image = $final_name;
        }
        $job->company_name = $request->company_name;
        $job->job_title = $request->job_title;
        $job->job_category_id = $request->job_category_id;
        $job->description = $request->description;
        $job->job_location = $request->job_location;
        $job->contact_email = $request->contact_email;
        $job->contact_email = $request->contact_email;
        $job->web_url = $request->web_url;
        $job->phone = $request->phone;
        $job->deadline = $request->deadline;
        $job->salary = $request->salary;
        $job->user_id = Auth::user()->id;

        $job->save();
        return redirect()->route('jobs.index');
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('job.show', compact('job'));
    }

    public function adminShow($id)
    {
        $job = Job::findOrFail($id);
        return view('job.adminShow', compact('job'));
    }


    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $job_categories = JobCategory::all();
        return view('job.edit', compact('job', 'job_categories'));
    }


    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'job_location' => 'required|string',
            'contact_email' => 'required|string|email',
            'web_url' => 'nullable|string',
            'phone' => 'nullable|string',
            'deadline' => 'nullable|date',
            'salary' => 'nullable|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
        ]);

        if ($request->hasFile('image') && $request->image != null) {
            if ($job->image != null) {
                # code...
                unlink(public_path('uploads/'.$job->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'job'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $job->image = $final_name;
        }
        $job->company_name = $request->company_name;
        $job->job_title = $request->job_title;
        $job->job_category_id = $request->job_category_id;
        $job->description = $request->description;
        $job->job_location = $request->job_location;
        $job->contact_email = $request->contact_email;
        $job->contact_email = $request->contact_email;
        $job->web_url = $request->web_url;
        $job->phone = $request->phone;
        $job->deadline = $request->deadline;
        $job->salary = $request->salary;


        $job->update();
        return redirect()->route('jobs.index');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        if ($job->image != null) {
            unlink(public_path('uploads/'.$job->image));
        }

        $job->delete();

        return redirect()->back();
    }
}
