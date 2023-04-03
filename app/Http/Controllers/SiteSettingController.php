<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use DB;


class SiteSettingController extends Controller
{
    public function index()
    {
    	return view('Basic.index');
    }


    public function create()
    {
    	$basic = SiteSetting::all();

    	$b =  SiteSetting::first();
    	return view('Basic.create', compact('basic', 'b'));
    }


    public function store(Request $request)
    {



    // Validate the input
     $request->validate([
        'theme_color' => 'nullable|string',
        'address' => 'nullable|string',
        'phone_number' => 'nullable|string',
        'phone_number2' => 'nullable|string',
        'email' => 'nullable|string',
        'email2' => 'nullable|string',
        'team_des' => 'nullable',
        'contact_des' => 'nullable',
        'service_des' => 'nullable',
        'facebook' => 'nullable|string',
        'twitter' => 'nullable|string',
        'instagram' => 'nullable|string',
        'linkedin' => 'nullable|string',
    ]);


    $SiteSetting = new SiteSetting;

    if ($request->hasFile('logo')) {
            $ext = $request->file('logo')->extension();
            $final_name = time().'-'.uniqid().'-'.'logo'.'.'.$ext;

            $request->file('logo')->move(public_path('site_logo/'), $final_name);

            $SiteSetting->logo = $final_name;
     }

    if ($request->hasFile('icon')) {
            $ext = $request->file('icon')->extension();
            $final_name = time().'-'.uniqid().'-'.'icon'.'.'.$ext;

            $request->file('icon')->move(public_path('site_icon/'), $final_name);

            $SiteSetting->icon = $final_name;

    }

    if ($request->hasFile('site_image')) {
        $ext = $request->file('site_image')->extension();
        $final_name = time().'-'.uniqid().'-'.'site_image'.'.'.$ext;

        $request->file('site_image')->move(public_path('site_image/'), $final_name);

        $SiteSetting->site_image = $final_name;
    }

    $SiteSetting->site_name       = $request->input('site_name');
    $SiteSetting->site_slogan     = $request->input('slogan');
    $SiteSetting->site_title      = $request->input('site_title');
    $SiteSetting->site_des        = $request->input('site_des');

    $SiteSetting->theme_color  = $request->input('theme_color');
    $SiteSetting->address 	 = $request->input('address');
    $SiteSetting->phone_number 	= $request->input('phone_number');
    $SiteSetting->phone_number2 = $request->input('phone_number2');
    $SiteSetting->email 	 = $request->input('email');
    $SiteSetting->email2 	 = $request->input('email2');
    $SiteSetting->team_des 		= $request->input('team_des');
    $SiteSetting->contact_des  = $request->input('contact_des');
    $SiteSetting->service_des  = $request->input('service_des');
    $SiteSetting->facebook 		= $request->input('facebook');
    $SiteSetting->twitter 	 = $request->input('twitter');
    $SiteSetting->instagram  = $request->input('instagram');
    $SiteSetting->linkedin  = $request->input('linkedin');
    $SiteSetting->save();
    return redirect()->back()->with('success', 'You successfully add site setting');

   	}




    public function update(Request $request)
    {
    // Validate the input
     $request->validate([
        'theme_color' => 'nullable|string',
        'address' => 'nullable|string',
        'phone_number' => 'nullable|string',
        'phone_number2' => 'nullable|string',
        'email' => 'nullable|string',
        'email2' => 'nullable|string',
        'team_des' => 'nullable',
        'contact_des' => 'nullable',
        'service_des' => 'nullable',
        'facebook' => 'nullable|string',
        'twitter' => 'nullable|string',
        'instagram' => 'nullable|string',
        'linkedin' => 'nullable|string',
    ]);

    $b =  DB::table('site_settings')->first();

    
    $SiteSetting 					    = SiteSetting::find($b->id);

    if ($request->hasFile('logo')) {
        if ($SiteSetting->logo != null) {
                unlink(public_path('site_logo/'.$SiteSetting->logo));
        }
        $ext = $request->file('logo')->extension();
        $final_name = time().'-'.uniqid().'-'.'logo'.'.'.$ext;

        $request->file('logo')->move(public_path('site_logo/'), $final_name);

        $SiteSetting->logo = $final_name;
    }

    if ($request->hasFile('icon')) {
        if ($SiteSetting->icon != null) {
                unlink(public_path('site_icon/'.$SiteSetting->icon));
        }
        $ext = $request->file('icon')->extension();
        $final_name = time().'-'.uniqid().'-'.'icon'.'.'.$ext;

        $request->file('icon')->move(public_path('site_icon/'), $final_name);

        $SiteSetting->icon = $final_name;
    }


    if ($request->hasFile('site_image')) {
        if ($SiteSetting->site_image != null) {
                unlink(public_path('site_image/'.$SiteSetting->site_image));
        }
        $ext = $request->file('site_image')->extension();
        $final_name = time().'-'.uniqid().'-'.'site_image'.'.'.$ext;

        $request->file('site_image')->move(public_path('site_image/'), $final_name);

        $SiteSetting->site_image = $final_name;
    }

    if ($request->hasFile('profile')) {
        if ($SiteSetting->profile != null) {
                unlink(public_path('profile/'.$SiteSetting->profile));
        }
        $ext = $request->file('profile')->extension();
        $final_name = time().'-'.uniqid().'-'.'profile'.'.'.$ext;

        $request->file('profile')->move(public_path('profile/'), $final_name);

        $SiteSetting->profile = $final_name;
    }

    if ($request->hasFile('login_image')) {
        if ($SiteSetting->login_image != null) {
                unlink(public_path('login_image/'.$SiteSetting->login_image));
        }
        $ext = $request->file('login_image')->extension();
        $final_name = time().'-'.uniqid().'-'.'login_image'.'.'.$ext;

        $request->file('login_image')->move(public_path('login_image/'), $final_name);

        $SiteSetting->login_image = $final_name;
    }
    if ($request->hasFile('registration_image')) {
        if ($SiteSetting->registration_image != null) {
                unlink(public_path('registration_image/'.$SiteSetting->registration_image));
        }
        $ext = $request->file('registration_image')->extension();
        $final_name = time().'-'.uniqid().'-'.'registration_image'.'.'.$ext;

        $request->file('registration_image')->move(public_path('registration_image/'), $final_name);

        $SiteSetting->registration_image = $final_name;
    }

    $SiteSetting->site_name        = $request->input('site_name');
    $SiteSetting->site_slogan           = $request->input('slogan');
    $SiteSetting->site_title       = $request->input('site_title');
    $SiteSetting->site_des         = $request->input('site_des');
    $SiteSetting->theme_color 		= $request->input('theme_color');
    $SiteSetting->address 			= $request->input('address');
    $SiteSetting->phone_number 	= $request->input('phone_number');
    $SiteSetting->phone_number2 	= $request->input('phone_number2');
    $SiteSetting->email 			= $request->input('email');
    $SiteSetting->email2 			= $request->input('email2');
    $SiteSetting->team_des 		= $request->input('team_des');
    $SiteSetting->contact_des 		= $request->input('contact_des');
    $SiteSetting->service_des 		= $request->input('service_des');
    $SiteSetting->facebook 		= $request->input('facebook');
    $SiteSetting->twitter 			= $request->input('twitter');
    $SiteSetting->instagram 		= $request->input('instagram');
    $SiteSetting->linkedin 		= $request->input('linkedin');
    $SiteSetting->update();



    return redirect()->back()->with('success', 'You successfully updated site setting');
    }


    public function destroy($id)
    {
    	$basic = SiteSetting::find($id);
    	$basic->delete();

    	return redirect()->back()->with('success', 'You have been deleted your basic site settings');
    }

}