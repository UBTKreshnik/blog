<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blogs::all();

        return view('blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string']
        ]);

        $blog = Blogs::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/show/'. $blog->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $blog = Blogs::findOrFail($id);
        $content = $blog->markdown_body;
        return view('blogs.show', ['content' => $content, 'title' => $blog->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blogs::findOrFail($id);

        return view('blogs.edit', ['title' => $blog->title, 'content' => $blog->body, 'id' => $blog->id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        try {$this->validate($request, [
            'id' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string']
        ]);} catch (Exception $a) {dd($a);}
        
        $blog = Blogs::findOrFail($request->id);

        $blog->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect('/show/'.$blog->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blogs::findOrFail($id);
        $blog->delete();
        return redirect('blogs.index');
    }
}
