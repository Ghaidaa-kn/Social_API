<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use App\Friend;
use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');//->except(['index' ,'show']);
    }

    public function index(){
    	//dd(Post::all());
    	//$posts = Post::all();//take(3)->get();
    	//$posts = Post::where('id' , 3)->get();
    	$posts = Post::orderBy('id','asc')->get();//->paginate(4) ""for pagenation"";   //OR desc
    	//$posts = DB::select('select * from posts');   // neeed "use DB;"
    	$count = Post::count();
    	return view('Posts.index' , compact('posts' , 'count'));
    }


    public function show($id){
    	$post = Post::find($id);

        $comments = DB::table('comments')->where('post_id' , $id)
        ->join('users' , 'comments.user_id' , '=' , 'users.id')
        ->select('users.*' , 'comments.*')
        ->get();

    	return view('Posts.show' , compact('post' , 'comments'));
    }

    public function create(){
    	return view('Posts.create');
    }

    public function store(Request $request){
    	//dd($request); // OR dd($request->title);
    	$this->validate($request,[
    		'title' => 'required | max:100' ,
    		'body' => 'required | max:200' ,
            'coverimage' => 'image | mimes :jpg,png,jpeg,bmp | max : 1999'
    	]);

        if($request->hasFile('coverimage')){

            $file = $request->file('coverimage');
            $ext = $file->getClientOriginalExtension();
            $filename = 'coverimage' . '_' . time() . $ext ;
            $file->storeAs('public/coverimage' , $filename);
            
        } else {

            $filename = 'noimage.png';
        }

    	$post = new Post();
    	$post->title = $request->title;
    	$post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->image = $filename;
    	$post->save();

    	return redirect('/posts')->with('status' , 'The post was created');
    }

    public function edit($id){

    	$post = Post::find($id);
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error' , 'You are not authorized');
        }
    	return view('Posts.edit' , compact('post'));
    }

    public function update(Request $request , $id){

        $post = Post::find($id);
    	$this->validate($request,[
    		'title' => 'required | max:100' ,
    		'body' => 'required | max:200'
    	]);
 
    	$post->title = $request->title;
    	$post->body = $request->body;
    	$post->save();

    	return redirect('/posts')->with('status' , 'The post was updated');
    }

    public function destroy($id){
    	$post = Post::find($id);
        Comment::where('post_id' , $id)->delete();
    	$post->delete();
    	return redirect('/posts')->with('status' , 'The post was deleted');
    }

    public function createComment(Request $req , $id){
        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = Post::where('id' , $id)
          ->first()->id;
        $comment->comment = $req->comment;
        $comment->save();
        return redirect('/posts/'. $id);
    }

    function testcomment($id){
        $post = Post::find($id);
        $comments = $post->comments;
        return view('test' , compact('post' , 'comments'));
    }

}
