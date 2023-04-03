<?php

namespace App\Http\Controllers;

use App\Models\EventApplication;
use Illuminate\Http\Request;
use Auth;
class EventApplicationController extends Controller
{
    public function index()
    {
        $eventApplication = EventApplication::get();
        return view('events.eventApplication',compact('eventApplication'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, EventApplication $eventApplication)
    {
        $request->validate([
            'name' => "string|required",
            'email' => "string|nullable",
            'phone' => "string|nullable",
            'bkash_number' => "string|required",
            'bkash_transaction' => "string|required",
            'bkash_transaction_image' => "'image|mimes:jpeg,gif,png,jpg'",
        ]);


        $eventApplication->user_id = Auth::user()->id;
        $eventApplication->event_id = $request->event_id;
        $eventApplication->name = $request->name;
        $eventApplication->email = $request->email;
        $eventApplication->phone = $request->phone;
        $eventApplication->bkash_number = $request->bkash_number;
        $eventApplication->bkash_transaction = $request->bkash_transaction;
        $eventApplication->status = "Pending";
        $eventApplication->application_date = date("Y-m-d");
        $eventApplication->save();
        return redirect()->back()->with('success', 'Successfully Applied');
    }

    public function approveApplication($id)
    {
        $application = EventApplication::findOrFail($id);
        $application->status = 'Approved';
        $application->save();

        // Add any additional logic here, such as sending an email notification

        return redirect()->back();
    }
    
    public function declineApplication($id)
    {
        $application = EventApplication::find($id);
        $application->status = 'Declined';
        $application->save();

        // Add any additional logic here, such as sending an email notification

        return redirect()->back();
    }    

    public function show(EventApplication $eventApplication)
    {
        //
    }

    public function edit($id)
    {
        // return view('event.eventApplication');
    }

    public function update(Request $request, $id)
    {
        $eventApplication = EventApplication::findOrFail($id);
    }

    public function destroy($id)
    {
        $eventApplication = EventApplication::findOrFail($id);
        $eventApplication->delete(); 
        return redirect()->back();
    }
}
