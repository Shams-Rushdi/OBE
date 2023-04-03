<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $role = Role :: get();
        return view ('SuperAdminPanel.Role.index',compact('role'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('SuperAdminPanel.Role.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|max:50|min:3",
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = "web";
        $role->save();
        return redirect()->route('role.index')->with('success','Role has been Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

        return view ('SuperAdminPanel.Role.edit',compact('role'));

        //return view ('SuperAdminPanel.Role.edit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            "name"=>"required|max:50|min:3",
        ]);

        $role = Role::where ('id',$request->id)->first();
        $role->name = $request->name;
        $role->save();
        

        return redirect()->route('role.index')->with('success','Role has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
