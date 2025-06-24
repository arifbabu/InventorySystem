<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class MostViewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     */
    public function userwise()
    {
        // return "ok";
        // $popularpost = post::orderByViews()->take(11)->get();
        $userPopularposts = post::where('status', 1)->orderByViews()->paginate(50);
        foreach($userPopularposts as $post) {
            $post->unique_views_count = views($post)->unique()->count();
        }
        foreach($userPopularposts as $post) {
            $post->total_views = views($post)->count();
        }
        return view('admin.partials.pages.mostview.userwise', compact('userPopularposts')); 
    }
    public function postwise()
    {
        return view('admin.partials.pages.mostview.postwise');
    }
    public function categorywise()
    {
        return view('admin.partials.pages.mostview.categorywise');
    }
    public function monthwise()
    {
        return view('admin.partials.pages.mostview.monthwise');
    }
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
