@extends ('layout')
@section ('content')
    <h1>My Blog</h1>
    <p>{{ $post->body }}</p>
@endsection
