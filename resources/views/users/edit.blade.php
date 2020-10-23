@extends('layouts.app')

@section ('content')
    <div class="container-fluid">
      <div class="row justify-content-center py-2">
          <div class="col-lg-10">
            <h1>Edit</h1>
            <form action="/users" method="POST" class="form-container p-3" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ $user->username }}">
                    @error('username')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $user->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="8" cols="80" id="bio">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="avatar" class="mb-0">Avatar</label>
                  <div class="d-flex flex-column">
                    @if($user->avatar)
                      <img src="{{ $user->avatar }}" alt="your avatar" class="rounded-circle my-3" width="150px" height="150px">
                    @endisset

                    <div class="custom-file mt-2">
                      <input class="custom-file-input @error('avatar') is-invalid @enderror" type="file" name="avatar" id="avatar" value="{{ $user->avatar }}">
                      <label for="avatar" class="custom-file-label">Upload an image</label>
                      @error('avatar')
                          <span class="invalid-feedback" role="alert">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection
