@extends ('layout')

@section ('content')
    <div id="body-wrapper">
        <h1>Posts</h1>

        <ul>
            @foreach ($posts as $post)
                <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
