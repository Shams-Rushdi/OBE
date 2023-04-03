<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function index()
    {
        $job_application = JobApplication::with('job', 'user')->latest()->get();
        return view('job.jobApplication_list', compact('job_application'));
    }

    public function myJob()
    {
        $job_application = JobApplication::where('user_id', Auth::user()->id)->with('job', 'user')->latest()->get();
        return view('job.myapp', compact('job_application'));
    }

    public function create($id)
    {
        //
    }


    public function store(Request $request, JobApplication $jobApplication)
    {
        $request->validate([
            'resume' => 'required',
        ]);

        if ($request->hasFile('resume')) {
            $ext = $request->file('resume')->extension();
            $final_name = time().'-'.uniqid().'-'.'jobApplication'.$jobApplication->user_id.'.'.$ext;

            $request->file('resume')->move(public_path('uploads/'), $final_name);

            $jobApplication->resume = $final_name;
        }

        $jobApplication->user_id = Auth::user()->id;
        $jobApplication->job_id = $request->job_id;
        $jobApplication->save();

        return redirect()->back()->with('success', 'Successfully Applied');
    }

    public function show(JobApplication $jobApplication)
    {
        //
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('job.jobApplication', compact('job'));
    }

    public function update(Request $request, JobApplication $jobApplication)
    {
        //
    }


    public function destroy($id)
    {
        $job_application = JobApplication::findOrFail($id);
        if ($job_application->resume != null) {
            unlink(public_path('uploads/'.$job_application->resume));
        }

        $job_application->delete();

        return redirect()->back();
    }
}
