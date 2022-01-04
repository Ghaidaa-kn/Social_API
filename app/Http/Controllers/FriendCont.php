<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;

class FriendCont extends Controller
{
    //
    public function add_friend(Request $reuest ,$id){
    	$friend = new Friend();
    	$friend->name = Friend::find($id)->name;
    	$friend->user_id = auth()->user()->id;
    	$friend->save();
    	return redirect('/posts');
    }
}
