@extends('layouts.app')

@section ('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if (session('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-0">{{ $post->title }}</h1>
                    @can ('update', $post)
                        <div class="post-admin-section">
                            @if (! $post->isPublished())
                                <form action="/posts/{{ $post->id }}/publish" method="POST" style="display: none;">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-secondary ml-3" type="submit">
                                        Publish
                                    </button>
                                </form>
                            @endif
                            <a class="btn btn-white" href="/posts/{{ $post->id }}/edit" class="mr-2">Edit</a>
                        </div>
                    @endcan
                </div>

                <hr class="bg-white mt-2 mb-4">

                <div class="post-text">
                    <p class="description mb-1">{{ $post->description }}</p>
                    <p class="byline">Written by <a href="/users/{{ $post->user->username }}">{{ $post->user->displayName() }}</a></p>
                    <p class="body">{{ $post->body }}</p>
                </div>

                <div class="mt-4 tag-container">
                  <span>Tags: </span>
                    @forelse ($post->tags as $tag)
                        <a class="tag" href="/posts?tag={{ $tag->name }}">{{ $tag->name }}</a>
                    @empty
                        <p class="mb-0 ml-2">No tags available</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
