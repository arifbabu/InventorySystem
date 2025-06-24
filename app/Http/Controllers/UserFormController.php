<?php

namespace App\Http\Controllers;

use App\Models\UserForm;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class UserFormController extends Controller
{
    public function showUser(){
        $users = UserForm::all();
        return view('website.show', compact('users'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // ==============
        
        $route_name = [];

        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('as', $action)) {
                $route_name[] = $action['as'];
            }
        }
        dd($route_name);


        // =======================   


        $routes = Route::getRoutes();
        dd($routes);
        // $routes = Route::getRoutes()->getRoutes();
        $routes = Route::getRoutes();

        foreach ($routes as $route){
            return $route->getPath();
            return "ok";
        }



        
        // return "Role Page";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:user_forms|max:255',
            'email' => 'required|unique:user_forms',
        ]);
       $student = UserForm::create([
        'name' => $request->name,
        'email' => $request->email,
        'created_at' => Carbon::now(),
       ]);
       return redirect()->back();

    // if($validated->fails()) {
    //     return redirect()->back();
    //     // return redirect()->back()->withErrors($validator);
    // }
    
    }
    public function login(Request $request)
    {

        // return "User Found From Login";
        $user = UserForm::where('name', '=', $request->name)->where('email', '=', $request->email)->first();
        if($user){
            return view('website.create');
            return "found";
        }else{
            return "Not Found";
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(UserForm $userForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserForm $userForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserForm $userForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserForm $userForm)
    {
        //
    }
}
