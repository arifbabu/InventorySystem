<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Use Alert;
use App\Models\Mail;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function changePage(Request $request){
        return view('admin.partials.pages.users.pagerefresh');
    }

    public function index(Request $request){
        $data = User::orderBy('id', 'DESC')->with('posts')->paginate(50);
        return view('admin.partials.pages.users.index', compact('data'));
    }

    public function create(){
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.partials.pages.users.create', compact('roles'));
    }

    public function show($name){
        $user = User::where('name', $name)->first();
        return view('admin.partials.pages.users.show', compact('user'));
    }
    public function store(Request $request){
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return back();
        return redirect()->route('admin.partials.pages.users.index');
    }
    public function edit(User $user, $name){
        $user = User::where('name', $name)->first();
        $roles = Role::all();
        $userRole = $user->roles->all();
        return view('admin.partials.pages.users.edit', compact('user', 'roles', 'userRole'));
    }
    public function update(Request $request, User $user, $id){
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index');
    }
    public function destroy(User $user, Request $request){

        $users = User::doesntHave('posts');
        $user = $users->find($request->user_id)->delete();
        return response()->json(['status'=>'success']);
    }
        //  Use Right Now
        public function restoreUser(Request $request){
            $user = User::withTrashed()->find($request->user_id)->restore();
            return response()->json(['status'=>'success']);
            Alert::warning('Resoted Data!', 'Congratulations buddy! You saved me!!');
            return back();
        }
    
        public function permanentDeleteUser(Request $request){
            $user = User::onlyTrashed()->find($request->user_id)->forceDelete();
            return response()->json(['status'=>'success']);
            Alert::warning('Permanent Deleted!', 'Your File no longer available!');
            return back();
        }
    
        //  Use Right Now
}
