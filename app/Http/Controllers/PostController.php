<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use File;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Mail;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Support\Facades\Auth;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function commentApproval()
    {
        $posts = post::all();        
        return view('admin.partials.pages.approval.commentapproval', compact('posts'));
    }

    public function sitemap(){
        // return "ojk";
        if (!File::exists(public_path('websitemap'))) {
            File::makeDirectory(public_path('websitemap'));
        } 
      $site =  SitemapGenerator::create('http://localhost/learntechsolution/')
    ->getSitemap()
    // here we add one extra link, but you can add as many as you'd like
    // ->add(Url::create('/extra-page')->setPriority(0.5)->addAlternate('/extra-pagina', 'nl'))
    // ->writeToFile($sitemapPath);
    ->writeToFile('websitemap');
    return "ok";
    }


    public function active()
    {
        $categories = Category::all();
        $posts = post::orderBy('id', 'desc')->where('status', 1)->paginate(50);
        foreach($posts as $post) {
            $post->views = views($post)->count();
        }
        return view('admin.partials.pages.post.active', compact('categories', 'posts'));
    }
    public function inActive()
    {
        $categories = Category::all();
        $posts = post::orderBy('id', 'desc')->where('status', 0)->paginate(50);
        return view('admin.partials.pages.post.inactive', compact('categories', 'posts'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $posts = post::orderByUniqueViews()->paginate(12);
        $categories = Category::all();
        return view('admin.partials.pages.post.create', compact('posts', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $dom = new \DomDocument();
        $dom->loadHtml($validated['description'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file = $dom->getElementsByTagName('img');

        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'));
        }
 
        foreach($image_file as $key => $image) {
            $data = $image->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $img_data = base64_decode($data);
            $image_name = "/uploads/" . time().$key.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $img_data);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
 
        $validated['description'] = $dom->saveHTML();

        // $post = post::create($validated);
        // $post = post::create($request->all());
        $imageName = time().'.'.$request->image->extension();
        $post = post::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' =>  $request->image->move('assets/picture/', $imageName),
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            // 'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);
        return back();
        return response()->json([
            'success' => 'success message here',
        ]);
    }
    
    public function show(post $post, $id)
    {
        $post = post::find($id);
        return response()->json($post);
        return $id;
        return $post;
        return view('admin.partials.pages.post.show', compact('post'));
        $posts = post::orderBy('id', 'desc')->paginate(6);
        return $posts;
        return view('admin.partials.pages.post.show', compact('posts'));
    }
    public function edit(post $post, $slug)
    {
        $post = post::where('slug', $slug)->first();
        $categories = Category::all();
        return view('admin.partials.pages.post.edit', compact('post','categories'));
    }
    public function update(Request $request, post $post, $slug)
    {
        // return post::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $dom = new \DomDocument();
        $dom->loadHtml($validated['description'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file = $dom->getElementsByTagName('img');

        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'));
        }
 
        foreach($image_file as $key => $image) {
            $data = $image->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $img_data = base64_decode($data);
            $image_name = "/uploads/" . time().$key.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $img_data);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
 
        $validated['description'] = $dom->saveHTML();
        $post = post::where('slug', $slug)->first();

        $post->name = $request->name;
        $post->slug = Str::slug($request->name);
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->user_id = auth()->user()->id;
        $post->published_at = Carbon::now();

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().'.'.$request->image->extension();
            // 'image' =>  $request->image->move('images', $imageName);
            // 'image' =>  $request->image->move('assets/picture/', $imageName),
            $image->move('assets/picture/', $image_new_name);
            $post->image = 'assets/picture/' . $image_new_name;
        }
        $post->update();
        return redirect()->route('post.active');
        return response()->json([
            'success' => 'success message here',
        ]);
    }
    public function destroy(Request $request) // ajax delete post
    {
        post::find($request->post_id)->delete();
        return response()->json(['status'=>'success']);
    }

    public function postTrash(post $posts)
    {
        $trashposts = post::onlyTrashed()->latest()->paginate(20);
        return view('admin.partials.pages.trash.post', compact('posts', 'trashposts'));
    }
    public function userTrash(User $user)
    {
        // return "ok";
        $userTrashes = User::onlyTrashed()->latest()->paginate(20);
        return view('admin.partials.pages.trash.user', compact('userTrashes'));
    }   


       
    public function emailcompose(User $user)
    {
        return view('admin.partials.pages.mail.compose');
    }

    //  Use Right Now
    public function restorepost(Request $request){
        $post = post::withTrashed()->find($request->post_id)->restore();
        return response()->json(['status'=>'success']);
        Alert::warning('Resoted Data!', 'Congratulations buddy! You saved me!!');
        return back();
    }

    public function permanentDeletepost(Request $request){
        $post = post::onlyTrashed()->find($request->post_id)->forceDelete();
        return response()->json(['status'=>'success']);
        Alert::warning('Permanent Deleted!', 'Your File no longer available!');
        return back();
    }

    //  Use Right Now

    public function trashFolder()
    {
        $trash = post::onlyTrashed()->latest()->get();
        return view('website.post.posttrashFolder', compact('trash'));
    }

    public function changeStatus(Request $request)
    {
        $user = post::find($request->post_id);
        $user->status = $request->status;
        $user->save();  
        return response()->json(['success'=>'Status change successfully.']);
    }


    public function adminsinglepostShow(){
        // $singleposts = post::find($id);
        $singleposts = post::all();
        views($singleposts)->cooldown(1)->record();
        $totalViews = views($singleposts)->count();
        $uniqueViews = views($singleposts)->unique()->count();
        return view('website.single', compact('singleposts', 'totalViews', 'uniqueViews'));
    }   

    public function userpost(){
        // $user_id = Auth::id();
        // $posts = post::with('category', 'user')->where('user_id', $user_id)->paginate(50);
        $posts = post::with('category', 'user')->paginate(50);
        foreach($posts as $post) {
            $post->views = views($post)->count();
        }
        return view('admin.partials.pages.post.userpost', compact('posts'));
    }
     
}
