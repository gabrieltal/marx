@extends ('layout')

@section ('content')
    <div id="body-wrapper">
        <a href="/posts/create" class="yellow-color">Create Post</a>
        <h1>Posts</h1>

        <ul>
            @foreach ($posts as $post)
                <li>
                  <a href="{{ $post->path() }}">{{ $post->title }}</a>
                  <p>{{ $post->description }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
