<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission :: latest()->get();
        return view('SuperAdminPanel.Permission.index',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('SuperAdminPanel.Permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|max:50|min:3",
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->guard_name = "web";
        $permission->save();
        return redirect()->route('permission.index')->with('success','Permission has been Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view ('SuperAdminPanel.Permission.edit',compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            "name"=>"required|max:50|min:3",
        ]);

        $permission = Permission::where ('id',$request->id)->first();
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('permission.index')->with('success','Permission has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }
}
