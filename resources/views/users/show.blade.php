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

                <h1>{{ $user->name }}</h1>
                <p>{{ $user->displayName() }}</p>
                <p>{{ $user->bio }}</p>
                <div class="row">
                    <div class="col-lg">
                        <h2>Posts</h2>
                        <ul class="list-unstyled">
                          @forelse($user->posts as $post)
                            <li class="mb-3">
                              <a href="{{ $post->path() }}" class="yellow-color">{{ $post->title }}</a>
                            </li>
                          @empty
                            <li>No posts available.</li>
                          @endforelse
                        </ul>
                    </div>

                    <div class="col-lg-4">
                        <h2>Following</h2>
                        <ul class="list-unstyled">
                          @forelse($user->follows as $following)
                            <li class="mb-3">
                              <a href="{{ $following->path() }}">{{ $following->displayName() }}</a>
                            </li>
                          @empty
                            <li>Not following anyone.</li>
                          @endforelse
                        </ul>
                    </div>

                    <div class="col-lg-4">
                        <h2>Followers</h2>
                        <ul class="list-unstyled">
                          @forelse($user->followers as $follower)
                            <li class="mb-3">
                              <a href="{{ $follower->path() }}">{{ $follower->displayName() }}</a>
                            </li>
                          @empty
                            <li>Has no followers.</li>
                          @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
