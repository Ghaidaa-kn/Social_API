@extends('layouts.master')

@section('content')
<div class="container">
  <h3>All Friends</h3>
  <hr>
	
    @foreach($friends as $friend)
	
		<div class="card" style="width: 70rem; margin-left: 200px;">
			<div class="card-body">
				<p>{{$friend->friend_name}}</p>
				<div style=" float: right;">
					<a style="width: 150px; height: 40px;" class="btn btn-info" href=
					    "/visit/{{$friend->friend_id}}">Visit</a>
					    <a style="width: 150px; height: 40px;" class="btn btn-danger" href=
					    "/removeFriend/{{$friend->friend_id}}">Remove Friend</a>
				</div>   
			</div>
		</div>
	<br>

	@endforeach
</div>
		
@endsection