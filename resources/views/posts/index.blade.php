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

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-center">
              <h1 class="mb-0">Posts</h1>
              @can ('create', App\Post::class)
                  <a href="/posts/create" class="btn btn-secondary">Create Post</a>
              @endcan
            </div>
            <hr class="bg-white mt-2 mb-4">
            <ul class="list-unstyled">
                @forelse ($posts as $post)
                    <li>
                      <a href="{{ $post->path() }}" class="yellow-color">{{ $post->title }}</a>
                      <p>{{ $post->description }}</p>
                    </li>
                @empty
                    <li><p>No posts found!</p></li>
                @endforelse
            </ul>
          </div>
        </div>

    </div>
@endsection
