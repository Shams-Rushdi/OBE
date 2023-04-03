<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:event list', ['only' => ['index','show']]);
         $this->middleware('permission:event create', ['only' => ['create','store']]);
         $this->middleware('permission:event edit', ['only' => ['edit','update']]);
         $this->middleware('permission:event delete', ['only' => ['destroy']]);
   }

    public function index()
    {
        $events = Event::latest()->get();
        //$event_all =Event::count()->get();
        return view('events.index', compact('events'));
    }

    public function eventindexpage()
    {
        $events = Event::latest()->paginate(10);
        return view('events.eventIndexPage', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable',
            'start_time' => 'required',
            'type' => 'string|nullable',
            'cost' => 'integer|nullable',
        ]);

        if ($request->hasFile('image')) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'event'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $event->image = $final_name;
        }
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->type = $request->type;
        $event->cost = $request->cost;
        $event->user_id = Auth::user()->id;

        $event->save();
        return redirect()->route('event.index');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show',compact('event'));
    }


    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable',
            'start_time' => 'required|date_format:H:i:s',
            'type' => 'string|nullable',
            'cost' => 'integer|nullable',
        ]);

        if ($request->hasFile('image') && $request->image != null) {
            if ($event->image != null) {
                unlink(public_path('uploads/'.$event->image));
            }
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'event'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $event->image = $final_name;
        }

        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->type = $request->type;
        $event->cost = $request->cost;
        $event->user_id = Auth::user()->id;

        $event->update();
        return redirect()->route('event.index');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->image != null) {
            unlink(public_path('uploads/'.$event->image));
        }

        $event->delete();

        return redirect()->back();
    }
}
