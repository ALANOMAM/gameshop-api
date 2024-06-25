<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
          //per vedere l'oggetto creato dal form
         //dump($request);

         $newBlog = new Blog();
         $validated = $request->validated();
         $newBlog->fill($validated);
         
   
         $newBlog->user_id = Auth::id();
 
 
          $newBlog->save();
 
          return redirect()->route("admin.blogs.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //vedere come è acambiato l'aggetto quando modifico
         //dump($request);
         
         //salvo le nuove info dentro la variabile "$data"
         $data = $request->all();




         //Aggiorna i blogs
         $blog->update($data);
 
         //salvo le modifiche
         $blog->save();
 
         return redirect()->route('admin.blogs.index', $blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index');
    }
}
