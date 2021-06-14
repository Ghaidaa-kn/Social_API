@extends('layouts.master')

@section('content')
<p>This is About page</p>
<p>{{$title}}</p>
<ul>
@if(count($services) > 0)
@foreach( $services as $service)
<li>{{$service}}</li>
@endforeach
@endif
</ul>
<h1>Hi from about.blade.php</h1>
@endsection
