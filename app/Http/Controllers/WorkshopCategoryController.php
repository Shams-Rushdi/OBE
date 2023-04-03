<?php

namespace App\Http\Controllers;

use App\Models\WorkshopCategory;
use Illuminate\Http\Request;

class WorkshopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:workshop-category list', ['only' => ['index','show']]);
         $this->middleware('permission:workshop-category create', ['only' => ['create','store']]);
         $this->middleware('permission:workshop-category edit', ['only' => ['edit','update']]);
         $this->middleware('permission:workshop-category delete', ['only' => ['destroy']]);
   }
    public function index()
    {

        $workshop_categories = WorkshopCategory::latest()->get();
        return view('workshopCategory.index', compact('workshop_categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('workshopCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, WorkshopCategory $workshopCategory)
    {
        $request->validate([
            'name' => 'string|required'
        ]);

        $workshopCategory->name = $request->name;
        $workshopCategory->save();

        return redirect()->route('workshopcategories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $workshop_category = WorkshopCategory::find($id);
        $workshop_categories = WorkshopCategory::all();
        return view('workshopCategory.show', compact('workshop_category', 'workshop_categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $workshop_category = WorkshopCategory::findOrFail($id);
        return view('workshopCategory.edit', compact('workshop_category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $workshopCategory = WorkshopCategory::findOrFail($id);
        $request->validate([
            'name' => 'string|required'
        ]);

        $workshopCategory->name = $request->name;
        $workshopCategory->update();

        return redirect()->route('workshopcategories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $workshopCategory = WorkshopCategory::findOrFail($id);
        $workshopCategory->delete();

        return redirect()-back();
    }
}
