@extends ('layout')

@section ('content')
    <div id="body-wrapper">
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->description }}</p>
      <p>{{ $post->body }}</p>
    </div>
@endsection
