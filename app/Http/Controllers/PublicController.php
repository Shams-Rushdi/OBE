<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $departments = Department::latest()->get();
        $user = User::findOrFail(Auth::user()->id);
        $all_users = User::where('id', '!=', Auth::user()->id)->filter(request(['name','department_id','batch_id','student_id']))->limit(4)->get();
        return view('public.profile', compact('user', 'all_users','departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $departments = Department::latest()->get();
        $user_data = User::findOrFail($id);
        $all_users = User::where('id', '!=', $id)->filter(request(['name','department_id','batch_id','student_id']))->limit(4)->get();
        return view('public.show', compact('all_users', 'user_data', 'departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        if ($request->hasFile('profile_image') && $request->profile_image != null) {
            if ($user->profile_image != null) {
                # code...
                unlink(public_path('images/profile/'.$user->profile_image));
            }

            $ext = $request->file('profile_image')->extension();
            $final_name = time().'-'.uniqid().'-'.'profile'.'.'.$ext;
            $request->file('profile_image')->move(public_path('images/profile/'), $final_name);
            $user->profile_image = $final_name;
        }
        if ($request->hasFile('cover_image') && $request->cover_image != null) {
            if ($user->cover_image != null) {
                # code...
                unlink(public_path('images/profile/'.$user->cover_image));
            }
            $ext = $request->file('cover_image')->extension();
            $final_name = time().'-'.uniqid().'-'.'profile'.'.'.$ext;
            $request->file('cover_image')->move(public_path('images/profile/'), $final_name);
            $user->cover_image = $final_name;
        }
        //dd($request->all());
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->present_address = $request->present_address;
        $user->permanent_address = $request->permanent_address;
        $user->dob = $request->dob;
        $user->bio = $request->bio;
        $user->save();
        session()->flash('msg', 'successfull');
        return redirect()->back();
    }

    public function search() {
        $departments = Department::latest()->get();
        $roles = Role::whereIn('name', ['student', 'alumni', 'teacher'])->get();
        $all_users = User::filter(request(['name','department_id','batch_id','student_id']))->role($roles)->limit(20)->get();
        return view('public.search', compact('all_users','departments'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
