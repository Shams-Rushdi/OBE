<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Advertisement::get();
        return view('advertisement.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
        ]);

        if ($request->hasFile('image') && $request->image != null) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'ads'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $advertisement->image = $final_name;
        }
        $advertisement->name = $request->name;
        $advertisement->description = $request->description;
        $advertisement->title = $request->title;
        $advertisement->save();
        return redirect()->route('advertisements.index');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('advertisement.edit',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
        ]);

        if ($request->hasFile('image') && $request->image != null) {
            if ($advertisement->image != null) {
                unlink(public_path('uploads/'.$advertisement->image));
            }
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'advertisement'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $advertisement->image = $final_name;
        }
        $advertisement->name = $request->name;
        $advertisement->description = $request->description;
        $advertisement->title = $request->title;
        $advertisement->update();

        return redirect()->route('advertisements.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { 
        $advertisement = Advertisement::findOrFail($id);
        if ($advertisement->image != null) {
            unlink(public_path('uploads/'.$advertisement->image));
        }

        $advertisement->delete();

        return redirect()->back();   
    }
}
