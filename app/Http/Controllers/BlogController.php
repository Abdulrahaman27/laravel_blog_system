<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // show all posts
    public function index(){

        $blogs = Blog::latest()->paginate(6);
        return view('blogs.index', compact('blogs'));
    }

    // show form to create a post
    public function create(){
        return view('blogs.create');
    }

    // show form to edit a post
    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    // store a new post
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:120',
            'content' => 'required|max:2000',
            'category' => 'nullable|max:50',
            'image' => 'nullable|image|max:2048',
        ]);

        // Save to database
        $blog = new Blog();
        $blog->title = $validated['title'];
        $blog->content = $validated['content'];
        $blog->category = $validated['category'] ?? null;
        if($request->hasFile('image')){
            // delete old image if exists
            if($blog->image_path){
                Storage::disk('public')->delete($blog->image_path);
            }
            $path = $request->file('image')->store('images','public');
            $blog->image_path = $path;
        }
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    // update an existing post
        public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|max:120',
            'content' => 'required|max:2000',
            'category' => 'nullable|max:50',
            'image' => 'nullable|image|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $validated['title'];
        $blog->content = $validated['content'];
        $blog->category = $validated['category'] ?? null;
        if($request->hasFile('image')){

            if($blog->image_path){
                Storage::disk('public')->delete($blog->image_path);
            }
            $path = $request->file('image')->store('images','public');
            $blog->image_path = $path;
        }
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully.');
    }

    // delete a post
    public function destroy($id){
        $blog = Blog::findOrFail($id);
        // delete associated image if exists
        if($blog->image_path){
            Storage::disk('public')->delete($blog->image_path);
        }
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully.');
    }

}

