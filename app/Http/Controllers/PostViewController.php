<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class postViewController extends Controller
{
    public function show($slug)
    { 
       
        $post = post::where('slug', $slug)->where('status', 1)->first();
        if($post){
            views($post)->cooldown(1)->record();
            $totalViews = views($post)->count();
            $related= post::where('category_id', '=', $post->category->id)->where('id', '!=', $post->id)->inRandomOrder()->where('status' , 1)->take(11)->get();
            $latestpost = post::take(12)->orderBy('created_at', 'desc')->where('status' , 1)->get();
            $popularpost = post::orderByViews()->take(12)->where('status' , 1)->get();
            return view('website.partials.pages.post_details', compact('post', 'related', 'latestpost', 'popularpost'));
        }
        return redirect()->route('post.view.homepage');
       

    }

    public function category($slug)
    {        
        $category = Category::where('slug', $slug)->first();
        if($category){
            $posts = post::where('category_id', $category->id)->orderBy('id', 'desc')->where('status' , 1)->paginate(16);
            $latestpost = post::take(12)->orderBy('created_at', 'desc')->where('status' , 1)->get();
            $popularpost = post::orderByViews()->take(12)->where('status' , 1)->get();
            return view('website.partials.pages.category', compact('category', 'posts','latestpost', 'popularpost'));
        }else{
            return redirect()->route('post.view.homepage');
        }
    }
    public function homepage()
    {
        // return "HomePage From postViewController!";
        $posts = post::inRandomOrder()->where('status' , 1)->paginate(16);
        $latestpost = post::take(12)->orderBy('created_at', 'desc')->where('status' , 1)->get();
        $popularpost = post::orderByViews()->take(12)->where('status' , 1)->get();
        return view('website.partials.pages.index', compact('posts','latestpost', 'popularpost'));

    }
}
