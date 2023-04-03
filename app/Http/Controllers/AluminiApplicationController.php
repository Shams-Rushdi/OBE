<?php

namespace App\Http\Controllers;

use App\Models\AluminiApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AluminiApplicationController extends Controller
{
    public function index()
    {
    $all_applications = AluminiApplication::get();
        return view('aluminiApplication.index',compact('all_applications'));
    }


    public function apply()
    {
        return view('aluminiApplication.apply');
    }

    public function welcome()
    {
        return view('aluminiApplication.welcome');
    }

    public function create(AluminiApplication $aluminiApplication)
    {

        if (AluminiApplication::where('user_id', Auth::user()->id)->first()) {
            return view('aluminiApplication.alreadyApplied');
        }

        $aluminiApplication->user_id = Auth::user()->id;
        $aluminiApplication->status = "Pending";
        $aluminiApplication->save();

        return redirect()->route('alumini.welcome');
    }


    public function approveApplication($id)
    {
        $application = AluminiApplication::findOrFail($id);
        $application->status = 'Approved';
        $application->save();

        // Add any additional logic here, such as sending an email notification

        return redirect()->back();
    }

    public function declineApplication($id)
    {
        $application = AluminiApplication::find($id);
        $application->status = 'Declined';
        $application->save();

        // Add any additional logic here, such as sending an email notification

        return redirect()->back();
    }



    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AluminiApplication $aluminiApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AluminiApplication $aluminiApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AluminiApplication $aluminiApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AluminiApplication $aluminiApplication)
    {
        //
    }
}
