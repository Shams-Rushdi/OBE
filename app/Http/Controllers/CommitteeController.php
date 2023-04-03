<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\CommitteeCategory;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $committee = Committee::get();
        return view('CommitteePanel.index',compact('committee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = CommitteeCategory::get();
        return view('CommitteePanel.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Committee $committee)
    {
        $request->validate([
            'name' =>'required|max:255',
            'designation' =>'required|max:255',
            'company_name' =>'required|max:255',
            'phone_number' =>'required|max:255',
            'email' =>'required|email|max:255',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
        ]);

        if ($request->hasFile('image') && $request->image != null) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'committee'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $committee->image = $final_name;
        }

        $committee->name = $request->name;
        $committee->designation = $request->designation;
        $committee->company_name = $request->company_name;
        $committee->phone_number = $request->phone_number;
        $committee->email = $request->email;
        $committee->committee_category_id = $request->committee_category_id;

        $committee->save();

        return redirect()->route('CommitteePanel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Committee $committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = CommitteeCategory::get();
        $commitee = Committee::findOrFail($id);
        return view('CommitteePanel.edit', compact('commitee','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $committee = Committee::findOrFail($id);
        $request->validate([
            'name' =>'required|max:255',
            'designation' =>'required|max:255',
            'company_name' =>'required|max:255',
            'phone_number' =>'required|max:255',
            'email' =>'required|email|max:255',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
        ]);

        if ($request->hasFile('image') && $request->image != null) {
            if ($commitee->image != null) {
                unlink(public_path('uploads/'.$commitee->image));
            }
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'commitee'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $commitee->image = $final_name;
        }

        $committee->name = $request->name;
        $committee->designation = $request->designation;
        $committee->company_name = $request->company_name;
        $committee->phone_number = $request->phone_number;
        $committee->email = $request->email;
        $committee->committee_category_id = $request->committee_category_id;
        $committee->update();

        return redirect()->route('committee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commitee = Committee::findOrFail($id);
        if ($commitee->image != null) {
            unlink(public_path('uploads/'.$commitee->image));
        }

        $commitee->delete();

        return redirect()->back();        
    }
}
