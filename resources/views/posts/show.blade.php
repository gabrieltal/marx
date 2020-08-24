@extends ('layout')

@section ('content')
    <div id="body-wrapper">
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->description }}</p>
      <p>{{ $post->body }}</p>

      <p>
          @foreach ($post->tags as $tag)
              <a href="/posts?tag={{ $tag->name }}">{{ $tag->name }}</a>
          @endforeach
      </p>
    </div>
@endsection
