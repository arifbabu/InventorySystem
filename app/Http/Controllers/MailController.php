<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function contactPage()
    {
        $posts = post::inRandomOrder()->where('status' , 1)->paginate(16);
        $latestpost = post::take(12)->orderBy('created_at', 'desc')->where('status' , 1)->get();
        $popularpost = post::orderByViews()->take(12)->where('status' , 1)->get();
        return view('website.partials.pages.contact', compact('posts', 'latestpost', 'popularpost'));
    }
    public function index()
    {
        $userMails = Mail::paginate(8);
        return view('admin.partials.pages.mail.inbox', compact('userMails'));
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
    public function userMailStore(Request $request)
    {
        // return "mail stored!";
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'subject.required' => 'Subject is required',
        ]);

        $input = $request->all();
        $user = Mail::create($input);
        return back()->with('success', 'Mail Sent successfully.');
    }

    public function mailTrash(Mail $mail)
    {
        $emailTrashes = Mail::onlyTrashed()->latest()->paginate(20);
        return view('admin.partials.pages.trash.email', compact('emailTrashes'));
    } 

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mail $mail, $id)
    {
        $mail = Mail::find($id);
        return view('admin.partials.pages.mail.show', compact('mail'));
        return $mail;
        return "ok";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail, Request $request)  // ajax delete Email
    {
        Mail::find($request->email_id)->delete();
        return response()->json(['status'=>'success']);
    }
     //  Use Right Now
     public function restoreEmail(Request $request){
        $email = Mail::withTrashed()->find($request->email_id)->restore();
        return response()->json(['status'=>'success']);
        Alert::warning('Resoted Data!', 'Congratulations buddy! You saved me!!');
        return back();
    }

    public function permanentDeleteEmail(Request $request){
        $email = Mail::onlyTrashed()->find($request->email_id)->forceDelete();
        return response()->json(['status'=>'success']);
        Alert::warning('Permanent Deleted!', 'Your File no longer available!');
        return back();
    }


    public function singleEmailDelete(Mail $mail, $id)
    {
        $email = Mail::find($id)->delete();
        return back();
    }

    public function removeMulti(Request $request)
    {
        $ids = $request->ids;
        Mail::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"User successfully removed."]);
          
    }
}
