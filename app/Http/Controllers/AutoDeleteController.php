<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserForm;
use Carbon\Carbon;


use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;







class AutoDeleteController extends Controller
{
    public function index(){
        $users = UserForm::all();
        $users->where('created_at', '>=', Carbon::now()->subMinutes(1)->toDateTimeString());
        return view('website.autodeletePage', compact('users'));
        // return "Auto Delete Page";
    }


    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DB::table('user_forms')->delete();
        })->everyMinute();
    }















}
