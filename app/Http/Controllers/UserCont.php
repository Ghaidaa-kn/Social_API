<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;

class UserCont extends Controller
{
    //
    public function users(){
        $users = User::orderBy('id','asc')->get();
        return view('users' , compact('users'));
    }
    

}
