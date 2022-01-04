@extends('layouts.master')

@section('content')
<div class="container">
<div class="row mt-3">
   <div class="col-sm-8 offset-md-2">
		<div class="card">
		      <div class="card-body">
		      	    <img src="{{asset('storage/coverimage/' . $post->image)}}"  alt="" height="400" width="700">

			        <h3 class="card-title">{{$post->title}}</h3>
			        <p class="card-text">{{$post->body}}</p>
			        <hr>
			        <p class=""></p>
			        <small class="text-muted"><p>{{$post->created_at}}</p></small>
			        <p style="color:blueviolet;">Created by : {{$post->user->name}}</p>
			        @auth
			        @if(auth()->user()->id == $post->user->id)
			        <a href="{{'/posts/'. $post->id .'/edit'}}" class="btn btn-primary float-left mr-2">Edit</a>
			        <!-- <a href="#" class="btn btn-danger">Delete</a> -->
			        <!-- <form action="{{route('posts.destroy' , ['id' => $post->id])}}" method="POST">
			        	{{csrf_field()}}
			        	<button type="submit" class="btn btn-danger float-left ">Delete</button>
			        </form> -->
			        <a href="{{'/posts/'. $post->id .'/destroy'}}" class="btn btn-danger float-left ">Delete</a>
			        @endif
			        @endauth
			        <hr>
			        <br>
			        @foreach($comments as $comment)
				        <a href="/visit/{{$comment->user_id}}">{{$comment->name}}</a>
				        <p>{{$comment->comment}}</p>
				        <hr>
			        @endforeach
			        <div class="panel-body">
				        <form class="form-horizontal" 
				           action="/comment/{{$post->id}}" 
				           method="POST">
					   		{{ csrf_field() }}
					   		<input type="text" name="comment" placeholder="Enter your comment..."
					   		style="width: 400px; height: 40px;">
					   		<button class="btn btn-warning">
					   		Comment</button>
					   	</form>
				   	</div>
		      </div>
		</div>
	 <br>
   </div>
</div>
</div>
@endsection