<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function home()
{
    $blogs = Blog::latest()->get();

    $categories = Blog::select('category')
        ->distinct()
        ->pluck('category');

    return view('frontend.home',
        compact('blogs', 'categories'));
}

    public function filter(Request $request)
    {
    $blogs = Blog::query();

    if ($request->search) {

        $blogs->where('title', 'LIKE', '%' . $request->search . '%');

    }

    if ($request->category) {

        $blogs->where('category', $request->category);

    }

    $blogs = $blogs->latest()->get();

    return view('frontend.filtered_blogs',
        compact('blogs'))->render();
    }

    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.index', compact('blogs'));
    }

    public function show($id)
    {
    $blog = Blog::findOrFail($id);

    return view('frontend.show', compact('blog'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function edit($id)
    {
    $blog = Blog::findOrFail($id);

    return view('admin.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
    $blog = Blog::findOrFail($id);

    $blog->update([
        'title' => $request->title,
        'slug' => \Str::slug($request->title),
        'category' => $request->category,
        'short_description' => $request->short_description,
        'content' => $request->content,
    ]);

    return redirect()->route('admin.blogs.index');
    }

    public function destroy($id)
    {
    $blog = Blog::findOrFail($id);

    $blog->delete();

    return redirect()->route('admin.blogs.index');
    }

    public function store(Request $request)
{
    $imageName = null;

    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);
    }

    Blog::create([
        'title' => $request->title,
        'slug' => \Str::slug($request->title),
        'category' => $request->category,
        'image' => $imageName,
        'short_description' => $request->short_description,
        'content' => $request->content,
        'published_date' => $request->published_date,
    ]);

    return redirect()->route('admin.blogs.index');
}
}