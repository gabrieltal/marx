@extends('layouts.app')

@section ('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <h1 class="mb-0">Users</h1>
            <hr class="bg-white mt-2 mb-4">
            <ul class="list-unstyled">
                @forelse ($users as $user)
                    <li class="mb-4">
                      <a href="{{ $user->path() }}" class="yellow-color">{{ $user->displayName() }}</a>
                      <p class="mb-0">{{ $user->bio }}</p>
                    </li>
                @empty
                    <li><p>No users found!</p></li>
                @endforelse
            </ul>

            {{ $users->links() }}
          </div>
        </div>
    </div>
@endsection
