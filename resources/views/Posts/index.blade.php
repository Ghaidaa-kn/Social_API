@extends('layouts.master')

@section('content')
<div class="container">

<div class="card mb-3" style="max-width: 20rem;">
			<div class=" card-header bg-info text-white">
				<h3 class="card-text"> All Posts : {{$count}}   </h3>
			</div>
</div>
</div>
<hr>

<div class="container">
<div class="row">
	<div class="">
		<div class="row">
		 @foreach($posts as $post)
		  <div class="col-sm-4">
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
	
</div>
</div>


@endsection


 