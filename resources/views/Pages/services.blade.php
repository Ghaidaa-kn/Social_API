@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-6">posts</div>
	<div class="col-md-3">counts</div>
</div>
<p>This is home page</p>
<h1>Hi from services.blade.php</h1>
<p>{{$data}}</p>
@endsection



<!-- <!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ env('APP_NAME' , 'fff') }}</title>
</head>
<body>
	<h1>Hi from index.blade.php</h1>
</body>
</html>

 -->
