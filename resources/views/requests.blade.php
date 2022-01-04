@extends('layouts.master')

@section('content')
<div class="container">
  <h3>All Requests</h3>
  <hr>
	
    @foreach($requests as $request)
	
		<div class="card" style="width: 70rem; margin-left: 200px;">
			<div class="card-body">
				<p>{{$request->name}}</p>
				<h7 class="card-subtitle mb-2 text-muted">{{$request->email}}</h7>
				<div style=" float: right;">
					<a style="width: 150px; height: 40px;" class="btn btn-info" href=
					    "/addFriend/{{$request->id}}">Accept</a>

					<a style="width: 150px; height: 40px;" class="btn btn-danger" href=
					    "/deleteReq/{{$request->user_id}}">Delete</a>
				</div>   
			</div>
		</div>
	<br>

	@endforeach
</div>
		
@endsection