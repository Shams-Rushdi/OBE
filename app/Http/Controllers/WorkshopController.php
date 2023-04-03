<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Models\Workshop;
use App\Models\WorkshopCategory;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:workshop list', ['only' => ['index','show']]);
        $this->middleware('permission:workshop create', ['only' => ['create','store']]);
        $this->middleware('permission:workshop edit', ['only' => ['edit','update']]);
        $this->middleware('permission:workshop delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $workshops = Workshop::with('speaker', 'workshopCategory')->latest()->get();
        return view('workshop.index', compact('workshops'));
    }
    public function workshopindexpage()
    {
        $workshop_categories = WorkshopCategory::all();
        $workshops = Workshop::with('workshopCategory', 'speaker')->latest()->paginate(8);
        return view('workshop.workshopIndexPage', compact('workshops', 'workshop_categories'));
    }

    public function card()
    {
        $workshops = Workshop::latest()->get();
        return view('workshop.card', compact('workshops'));
    }


    public function create()
    {
        $workshop_categories = WorkshopCategory::get();
        return view('workshop.create', compact('workshop_categories'));
    }

    public function store(Request $request, Workshop $workshop)
    {
        $request->validate([
            'title' =>'string|required',
            'description' =>'string|required',
            'location' =>'string|required',
            'start_date' =>'date|required',
            'end_date' =>'date|required',
            'duration' =>'integer|required',
            'organizer' =>'string|required',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'cost' =>'integer|required',
            'workshop_category_id' =>'integer|required'
        ]);


        if ($request->hasFile('image') && $request->image != null) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'workshop'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $workshop->image = $final_name;
        }

        $workshop->title = $request->title;
        $workshop->description = $request->description;
        $workshop->location = $request->location;
        $workshop->start_date = $request->start_date;
        $workshop->end_date = $request->end_date;
        $workshop->duration = $request->duration;
        $workshop->organizer = $request->organizer;
        $workshop->cost = $request->cost;
        $workshop->workshop_category_id = $request->workshop_category_id;
        $workshop->type = $request->type;
        $workshop->save();


        $data = [];
        $name = $request->name;
        $email = $request->email;
        // $speakerImage = $request->file('speaker_image'); // speaker image
        $bio = $request->bio;

        for ($i = 0; $i < count((array)$name); $i++) {
            // upload image and get the file name
            // $imagePath = 'uploads/' . time() . '_' . $speakerImage[$i]->getClientOriginalName();
            // $speakerImage[$i]->move('public/' . $imagePath);

            $data[] = [
                'workshop_id'   => $workshop->id,
                'name'          => $name[$i],
                'email'         => $email[$i],
                // 'speaker_image' => $imagePath, // store the file name that generated above
                'bio'           => $bio[$i],
                'created_at'    => now()->toDateTimeString(),
            ];
        }

        foreach ($data as $speaker) {
            Speaker::insert($speaker);
        }

        return redirect()->route('workshops.index');
    }

    public function show($id)
    {
        $workshop = Workshop::with('workshopCategory')->findOrFail($id);
        return view('workshop.show', compact('workshop'));
    }

    public function adminShow($id)
    {
        $workshop = Workshop::with('workshopCategory')->findOrFail($id);
        return view('workshop.adminShow', compact('workshop'));
    }

    public function edit($id)
    {
        $workshop = Workshop::findOrFail($id);
        $workshop_categories = WorkshopCategory::all();
        return view('workshop.edit', compact('workshop','workshop_categories'));
    }

    public function update(Request $request, $id)
    {
        $workshop = Workshop::findOrFail($id);
        $request->validate([
            'title' =>'string|required',
            'description' =>'string|required',
            'location' =>'string|required',
            'start_date' =>'date|required',
            'end_date' =>'date|required',
            'duration' =>'integer|required',
            'organizer' =>'string|required',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'cost' =>'integer|required',
            'workshop_category_id' =>'integer|required'
        ]);


        if ($request->hasFile('image') && $request->image != null) {
            if ($workshop->image != null) {
                unlink(public_path('uploads/'.$workshop->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'workshop'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $workshop->image = $final_name;
        }

        $workshop->title = $request->title;
        $workshop->description = $request->description;
        $workshop->location = $request->location;
        $workshop->start_date = $request->start_date;
        $workshop->end_date = $request->end_date;
        $workshop->duration = $request->duration;
        $workshop->organizer = $request->organizer;
        $workshop->cost = $request->cost;
        $workshop->workshop_category_id = $request->workshop_category_id;
        $workshop->type = $request->type;
        $workshop->save();


        $data = [];
        $name = $request->name;
        $email = $request->email;
        // $speakerImage = $request->file('speaker_image'); // speaker image
        $bio = $request->bio;

        for ($i = 0; $i < count((array)$name); $i++) {
            // upload image and get the file name
            // $imagePath = 'uploads/' . time() . '_' . $speakerImage[$i]->getClientOriginalName();
            // $speakerImage[$i]->move('public/' . $imagePath);

            $data[] = [
                'workshop_id'   => $workshop->id,
                'name'          => $name[$i],
                'email'         => $email[$i],
                // 'speaker_image' => $imagePath, // store the file name that generated above
                'bio'           => $bio[$i],
                'created_at'    => now()->toDateTimeString(),
            ];
        }

        foreach ($data as $speaker) {
            Speaker::insert($speaker);
        }

        return redirect()->route('workshops.index');
    }

    public function destroy($id)
    {
        $workshop = Workshop::findOrFail($id);
        if ($workshop->image != null) {
            unlink(public_path('uploads/'.$workshop->image));
        }

        $workshop->delete();

        return redirect()->back();
    }

    public function howtopay()
    {
        return view('workshop.howtopay');
    }
}
