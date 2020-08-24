@extends('layouts.app')

@section ('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="mb-0">{{ $post->title }}</h1>
                <div class="post-text">
                    <p class="description">{{ $post->description }}</p>
                    <p class="body">{{ $post->body }}</p>
                </div>

                <div class="mt-4 tag-container">
                    <span>Tags: </span>
                    @foreach ($post->tags as $tag)
                        <a class="tag" href="/posts?tag={{ $tag->name }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
