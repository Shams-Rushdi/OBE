<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
   function __construct()
     {
          $this->middleware('permission:blog list', ['only' => ['index','show']]);
          $this->middleware('permission:blog create', ['only' => ['create','store']]);
          $this->middleware('permission:blog edit', ['only' => ['edit','update']]);
          $this->middleware('permission:blog delete', ['only' => ['destroy']]);
    }



    public function index()
    {
        
        $blogs = Blog::with('blogsCategory')->latest()->paginate(10);
        return view('blog.index', compact('blogs'));
    }
   
    public function blogindexpage()
    {
        $blog_categories = Category::all();
        $blogs = Blog::with('blogsCategory')->latest()->get();
        return view('blog.blogIndexPage', compact('blogs', 'blog_categories'));
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'video' => 'nullable|string',
            'content' => 'string',
            'category_id' => 'integer'
        ]);


        if ($request->hasFile('image') && $request->image != null) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'blog'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $blog->image = $final_name;
        }


        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->video = $request->video;
        $blog->content = $request->content;
        $blog->category_id = $request->category_id;
        $blog->user_id = Auth::user()->id;

        $blog->save();
        return redirect()->route('blogs.index');
    }

    public function show($id)
    {
        $blog = Blog::with('blogsCategory')->findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'video' => 'nullable|string',
            'content' => 'string',
            'category_id' => 'integer'
        ]);


        if ($request->hasFile('image') && $request->image != null) {
            if ($blog->image != null) {
                unlink(public_path('uploads/'.$blog->image));
            }
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'blog'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $blog->image = $final_name;
        }

        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->video = $request->video;
        $blog->content = $request->content;
        $blog->category_id = $request->category_id;

        $blog->update();
        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image != null) {
            unlink(public_path('uploads/'.$blog->image));
        }

        $blog->delete();

        return redirect()->back();
    }
}
