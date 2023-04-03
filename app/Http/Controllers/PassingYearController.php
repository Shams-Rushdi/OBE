<?php

namespace App\Http\Controllers;

use App\Models\PassingYear;
use Illuminate\Http\Request;

class PassingYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passing_years = PassingYear::get();
        return view('passingYear.index',compact('passing_years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('passingYear.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,PassingYear  $passingYear)
    {
        $request->validate([
            'passing_year' => 'required|string',
        ]);

        $passingYear->passing_year = $request->passing_year;
        $passingYear->save();

        return redirect()->route('passingyears.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PassingYear $passingYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $passingYear = PassingYear::findOrFail($id);
        return view('passingYear.edit', compact('passingYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $passingYear = PassingYear::findOrFail($id);
        $request->validate([
            'passing_year' => 'required|string',
        ]);

        $passingYear->passing_year = $request->passing_year;
        $passingYear->update();

        return redirect()->route('passingyears.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $passingYear = PassingYear::findOrFail($id);
       $passingYear->delete();
       return redirect()->back();
    }
}
