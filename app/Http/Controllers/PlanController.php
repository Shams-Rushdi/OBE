<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::latest()->get();
        return view('plan.list',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Plan $plan)
    {
        $request->validate([
            'membership_type' => 'required|string',
            'amount' => 'required',
            'validity' => 'required',

        ]);

        $plan->membership_type = $request->membership_type;
        $plan->amount = $request->amount;
        $plan->validity = $request->validity;
        $plan->save();

        return redirect()->route('plans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $plan = plan::findOrFail($id);

        return view('plan.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        $request->validate([
            'membership_type' => 'required|string',
            'amount' => 'required',
            'validity' => 'required',

        ]);


        $plan->membership_type = $request->membership_type;
        $plan->amount = $request->amount;
        $plan->validity = $request->validity;
        $plan->update();

        return redirect()->route('plans.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->back();

    }
}
