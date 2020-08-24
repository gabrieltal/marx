@extends('layouts.app')

@section ('content')
    <div class="container-fluid">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

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
