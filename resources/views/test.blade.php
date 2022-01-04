<h1>{{$post->id}}</h1>
@foreach($comments as $comment)
<h3>{{$comment->user_id}}</h3>
<h3>{{$comment->comment}}</h3>
@endforeach