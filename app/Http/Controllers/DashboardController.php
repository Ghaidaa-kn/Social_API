<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Friend;
use App\Req;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts;
        return view('dashboard' , compact('posts'));
    }

    public function allUsers(){
        $user = User::find(auth()->user()->id);
        //my friends
        $friends = $user->friends;
        $arr = array();
        foreach ($friends as $friend){
            $arr[] = $friend->friend_id;
        }
        //me sent to there a req
        $pending = Req::where('user_id' , auth()->user()->id)
        ->select('friend_id')->get();
        $arr1 = array();
        foreach ($pending as $req){
            $arr1[] = $req->friend_id;
        }
//as Accept?  who sent to me a req
        $arr2 = array();
        $recieves = Req::where('friend_id' , 
            auth()->user()->id)
            ->join('users' , 'users.id' , '=' , 'request.user_id')->select('request.*' , 'users.*')->get();
        foreach ($recieves as $recieve){
            $arr2[] = $recieve->id;
        }

//as Add friend
        $users = User::whereNotIn('id', ($arr))
        ->whereNotIn('id', ($arr1))
        ->whereNotIn('id', ($arr2))
        ->where('id' , '!=' , auth()->user()->id)
        ->get();
//as Requested  
        $sents = Req::where('user_id' , 
            auth()->user()->id)
            ->join('users' , 'users.id' , '=' , 'request.friend_id')->select('request.*' , 'users.*')->get();
        
      
      return view('users' , compact('users' , 'sents' ,'recieves'));
    }


    public function getUserPosts($id){
        $user = User::find($id);
        $posts = $user->posts;
        return view('userAccount' , compact('user' , 'posts'));
    }

    public function friendsPosts(){
        $posts = DB::table('friends')
        ->join('posts' , 'friends.friend_id','=' ,
            'posts.user_id')
        ->where('friends.user_id' , auth()->user()->id)
        ->select('posts.*')->distinct()
        ->get();
        $count = $posts->count();
        return view('Posts.index' , compact('posts' , 'count'));

    }


    public function addFriend($id){
        $friend = User::find($id);
        $id = $friend->id;
        $name = $friend->name;
        $new_fr = new Friend;
        $new_fr->user_id = auth()->user()->id;
        $new_fr->friend_id = $id;
        $new_fr->friend_name = $name;
        $new_fr->save();

        Req::where('user_id' , $id)
        ->where('friend_id' , auth()->user()->id)
        ->delete();
        
        $new_fr2 = new Friend();
        $new_fr2->user_id = $id;
        $new_fr2->friend_id = auth()->user()->id;
        $new_fr2->friend_name = auth()->user()->name;
        $new_fr2->save();
        return redirect('/users');
    }

    public function removeFriend($id){
        Friend::where('user_id' , auth()->user()->id)
        ->where('friend_id' , $id)
        ->delete();

        Friend::where('user_id' , $id)
        ->where('friend_id' , auth()->user()->id)
        ->delete();
        return redirect('/getFriends');
    }

    public function getFriends(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $friends = $user->friends;
        return view('friends' , compact('friends'));
    }
}
