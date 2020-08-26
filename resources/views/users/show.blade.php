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

                <div class="d-flex justify-content-between align-items-start mb-5">
                  <div class="d-flex">
                    <img src="{{ $user->avatar }}" alt="" class="rounded-circle" width="150px" height="150px">
                    <div class="ml-3">
                      <h1 class="mb-2">{{ $user->name }}</h1>
                      <p class="mb-2">{{ $user->displayName() }}</p>
                      <p>{{ $user->bio }}</p>

                    </div>
                  </div>

                  <div class="d-flex">
                    @auth
                      @if (auth()->user()->is($user))
                        <a href="/users/edit" class="btn btn-white ml-3">Edit</a>
                      @elseif (auth()->user()->isFollowing($user))
                      <form action="/users/{{ $user->username }}/unfollow" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="button" class="btn btn-secondary">Unfollow</button>
                      </form>
                      @else
                          <form action="/users/{{ $user->username }}/follow" method="POST">
                            @csrf
                            <button type="submit" name="button" class="btn btn-secondary">Follow</button>
                          </form>
                      @endif
                    @endauth
                  </div>
                </div>

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
