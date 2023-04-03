<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('notice.index', compact('notices'));
    }


    public function create()
    {
        return view('notice.create');
    }

    public function store(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'notice'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $notice->image = $final_name;
        }
        $notice->title = $request->title;
        $notice->description = $request->description;


        $notice->save();
        return redirect()->route('notices.index');
    }


    public function show(Notice $notice)
    {
        //
    }

    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('notice.edit', compact('notice'));
    }


    public function update(Request $request, $id)
    {
        $notice = Notice::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image') && $request->image !== null) {
            if ($notice->image !== null) {
                unlink(public_path('uploads/'.$notice->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'notice'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $notice->image = $final_name;
        }
        $notice->title = $request->title;
        $notice->description = $request->description;


        $notice->update();
        return redirect()->route('notices.index');
    }


    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        if ($notice->image != null) {
            unlink(public_path('uploads/'.$notice->image));
        }

        $notice->delete();

        return redirect()->back();
    }
}
