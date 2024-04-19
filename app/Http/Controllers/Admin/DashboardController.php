<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\SpinWin;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;



class DashboardController extends Controller
{
    public function index(){
        return view('backEnd.admin.admin');
    }
    public function userList(){
        $users = User::latest()->get();
        return view('backEnd.users.index',compact('users'));
    }

    public function winlist(){
        $users = SpinWin::latest()->get();
        return view('backEnd.users.spin_winner',compact('users'));
    }


}
