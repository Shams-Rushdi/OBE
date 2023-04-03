<?php

namespace App\Http\Controllers;

use App\Models\WorkshopApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkshopApplicationController extends Controller
{


    public function index()
    {
        $workshopApplication = WorkshopApplication::get();
        return view('workshop.workshopApplication',compact('workshopApplication'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, WorkshopApplication $workshopApplication)
    {
        $request->validate([
            'name' => "string|required",
            'email' => "string|nullable",
            'phone' => "string|nullable",
            'bkash_number' => "string|required",
            'bkash_transaction' => "string|required",
            'bkash_transaction_image' => "'image|mimes:jpeg,gif,png,jpg'",
        ]);


        $workshopApplication->user_id = Auth::user()->id;
        $workshopApplication->workshop_id = $request->workshop_id;
        $workshopApplication->name = $request->name;
        $workshopApplication->email = $request->email;
        $workshopApplication->phone = $request->phone;
        $workshopApplication->bkash_number = $request->bkash_number;
        $workshopApplication->bkash_transaction = $request->bkash_transaction;
        $workshopApplication->status = "Pending";
        $workshopApplication->application_date = date("Y-m-d");
        $workshopApplication->save();
        return redirect()->back()->with('success', 'Successfully Applied');
    }

    public function approveApplication($id)
    {
        $application = WorkshopApplication::findOrFail($id);
        $application->status = 'Approved';
        $application->save();

        // Add any additional logic here, such as sending an email notification

        return redirect()->back();
    }
    
    public function declineApplication($id)
    {
        $application = WorkshopApplication::find($id);
        $application->status = 'Declined';
        $application->save();

        // Add any additional logic here, such as sending an email notification

        return redirect()->back();
    }    

    public function show(WorkshopApplication $workshopApplication)
    {
        //
    }

    public function edit($id)
    {
        // return view('workshop.workshopApplication');
    }

    public function update(Request $request, $id)
    {
        $workshopApplication = WorkshopApplication::findOrFail($id);
    }

    public function destroy($id)
    {
        $workshopApplication = WorkshopApplication::findOrFail($id);
        $workshopApplication->delete(); 
        return redirect()->back();
    }
}
