@extends('layouts.master')

@section('content')
<h1>List of all posts</h1>
<hr>

<div class="row">
	<div class="col-md-8">
		<div class="row">
		 @foreach($posts as $post)
		  <div class="col-sm-3">
		    <div class="card">
		      <div class="card-body">
		      	<img src="{{asset('storage/coverimage/' . $post->image)}}"  alt="" height="200" width="200">
		        <h5 class="card-title">{{$post->title}}</h5>
		        <hr>
		        <p class="card-text">{{$post->body}}</p>
		        <a href="{{'/posts/'. $post->id}}" class="btn btn-primary">Show more</a>
		      </div>
		    </div>
		    <br>
		  </div>
		   @endforeach
		</div>
	</div>

	<div class="col-md-3">
		<div class="card mb-3" style="max-width: 18rem;">
			<div class="card-header bg-info text-white">
				Count
			</div>
			<div class="card-body">
				<p class="card-text"> All posts : {{$count}} </p>
			</div>
		</div>
	</div>
</div>



@endsection


 