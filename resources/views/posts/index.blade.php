@extends ('layout')

@section ('content')
    <div id="body-wrapper">
        <a href="/posts/create" class="yellow-color">Create Post</a>
        <h1>Posts</h1>

        <ul>
            @forelse ($posts as $post)
                <li>
                  <a href="{{ $post->path() }}">{{ $post->title }}</a>
                  <p>{{ $post->description }}</p>
                </li>
            @empty
                <li><p>No posts found!</p></li>
            @endforelse
        </ul>
    </div>
@endsection
