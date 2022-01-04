<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Req;
use DB;

class ReqController extends Controller
{
    //
    public function request($id){
        $request = new Req;
        $request->user_id = auth()->user()->id;
        $request->friend_id = $id;
        $request->pending = 1 ;
        $request->save();
        return redirect('/users');

    }

    public function getRequests(){
    	$requests = Req::where('friend_id' , 
    		auth()->user()->id)
    	    ->join('users' , 'users.id' , '=' , 'request.user_id')->select('request.*' , 'users.*')->get();
    	return view('requests' , compact('requests'));
    }

    public function deleteReq($id){
    	Req::where('user_id' , $id)->delete();
    	return redirect('/getRequests');
    }

    public function cancelReq($id){
    	Req::where('user_id' , auth()->user()->id)
    	->where('friend_id' , $id)
    	->delete();
    	return redirect('/users');
    }
}
