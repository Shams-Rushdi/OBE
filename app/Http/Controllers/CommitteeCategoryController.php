<?php

namespace App\Http\Controllers;

use App\Models\CommitteeCategory;
use Illuminate\Http\Request;

class CommitteeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $committeecategory = CommitteeCategory::all();

        return view('CommitteeCategory.index', compact('committeecategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CommitteeCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
        ]);

        $committee_category = new CommitteeCategory();
        $committee_category->name = $request->name;
        $committee_category->description = $request->description;
        $committee_category->save();

        return redirect()->route('committeecategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CommitteeCategory $committeeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $committeecategory = CommitteeCategory::findOrFail($id);

        return view('CommitteeCategory.edit', compact('committeecategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $committee_category = CommitteeCategory::findOrFail($id);

        $request->validate([
            'name' =>'required', 
        ]);

        $committee_category->name = $request->name;
        $committee_category->description = $request->description;
        $committee_category->update();

        return redirect()->route('committeecategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $committee_category = CommitteeCategory::findOrFail($id);
        $committee_category->delete();

        return redirect()->back();
    }
}
