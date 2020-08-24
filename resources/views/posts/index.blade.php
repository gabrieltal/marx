@extends('layouts.app')

@section ('content')
    <div class="container-fluid">
        <a href="/posts/create" class="mb-2 btn btn-secondary">Create Post</a>
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
