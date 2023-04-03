<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Models\Workshop;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::with('workshop')->latest()->get();
        return view('speaker.index',compact('speakers'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Speaker $speaker)
    {
        //
    }


    public function edit($id)
    {
        $workshops = Workshop::get();
        $speaker = Speaker::findOrFail($id);

        return view('speaker.edit', compact('speaker', 'workshops'));

    }

    public function update(Request $request, $id)
    {

        $speaker = Speaker::findOrFail($id);

        $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'bio' => 'string|required',
        ]);

        $speaker->name = $request->name;
        $speaker->email = $request->email;
        $speaker->bio = $request->bio;
        $speaker->update();

        return redirect()->route('speakers.index');

    }

    public function destroy($id)
    {

        $workshop = Speaker::findOrFail($id);
        // if ($workshop->image != null) {
        //     unlink(public_path('uploads/'.$workshop->image));
        // }

        $workshop->delete();

        return redirect()->back();

    }
}
