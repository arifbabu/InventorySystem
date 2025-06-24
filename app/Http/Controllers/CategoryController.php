<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $data = Category::with('posts')->paginate(15);
        return view('admin.partials.pages.category.index', compact('data'));
        
        return back();
        return "Ok";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'subject' => $request->subject,
            'user_id' => Auth::user()->id,
            'published_at' => Carbon::now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category,$slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('admin.partials.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, $id)
    {
        $cat = Category::find($id);
        $cat->update($request->all());
        $cat->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'subject' => $request->subject,
        ]);
        $user_id = Auth::id();
        $data = Category::paginate(15);
        return view('admin.partials.pages.category.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {
        $categoryposts = Category::doesntHave('posts');
        $category = $categoryposts->find($request->category_id)->delete();
        return response()->json(['status'=>'success']);
    }
}
