@extends('layout')

@section('content')
    <div id="body-wrapper">
        <h2>Edit post</h2>

        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>
                <div class="control">
                    <input type="text" name="title" id="title" value="{{ $post->title }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Tagline</label>
                <div class="control">
                    <input type="text" name="description" id="description" value="{{ $post->description }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="body">Content</label>

                <div class="control">
                  <textarea name="body" rows="8" cols="80" id="body" required>{{ $post->body }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="control">
                    <button type="submit" class="button is-link">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
