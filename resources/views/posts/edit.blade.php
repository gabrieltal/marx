@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center py-2">
            <div class="col-lg-10">
                <h2>Edit post</h2>
                <form action="/posts/{{ $post->id }}" method="POST" class="form-container p-3">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ $post->title }}">

                        @error('title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Tagline</label>
                        <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ $post->description }}">

                        @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Content</label>

                        <div class="control">
                          <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="8" cols="80" id="body">{{ $post->body }}</textarea>

                          @error('body')
                              <span class="invalid-feedback" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>

                        <select class="form-control" name="tags[]" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
