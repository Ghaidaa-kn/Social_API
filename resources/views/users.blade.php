@extends('layouts.master')

@section('content')
<div class="container">
  <h3>All Users</h3>
  <hr>
	
    @foreach($users as $user)
	
		<div class="card" style="width: 70rem; margin-left: 200px;">
			<div class="card-body">
				<p>{{$user->name}}</p>
				<h7 class="card-subtitle mb-2 text-muted">{{$user->email}}</h7>
				<div style=" float: right;">
					<a style="width: 150px; height: 40px;" class="btn btn-info" href=
					    "/visit/{{$user->id}}">Visit</a>
					
					<a style="width: 150px; height: 40px;"
				     class="btn btn-success" href=
					    "/request/{{$user->id}}">Add Friend
					</a>
				</div>  
			</div>
		</div>
	<br>

	@endforeach

	@foreach($sents as $sent)
	
		<div class="card" style="width: 70rem; margin-left: 200px;">
			<div class="card-body">
				<p>{{$sent->name}}</p>
				<h7 class="card-subtitle mb-2 text-muted">{{$sent->email}}</h7>
				<div style=" float: right;">
					<a style="width: 150px; height: 40px;" class="btn btn-info" href=
					    "/visit/{{$sent->id}}">Visit</a>
					
					<a style="width: 150px; height: 40px;"
				     class="btn btn-success" href=
					    "/cancelReq/{{$sent->id}}">Requested
					</a>
				</div>  
			</div>
		</div>
	<br>

	@endforeach

	@foreach($recieves as $recieve)
	
		<div class="card" style="width: 70rem; margin-left: 200px;">
			<div class="card-body">
				<p>{{$recieve->name}}</p>
				<h7 class="card-subtitle mb-2 text-muted">{{$recieve->email}}</h7>
				<div style=" float: right;">
					<a style="width: 150px; height: 40px;" class="btn btn-info" href=
					    "/visit/{{$recieve->id}}">Visit</a>
					
					<a style="width: 150px; height: 40px;"
				     class="btn btn-success" href=
					    "/addFriend/{{$recieve->id}}">Accept
					</a>
				</div>  
			</div>
		</div>
	<br>

	@endforeach
</div>
		
@endsection