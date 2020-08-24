@extends('layout')

@section('content')
    <div id="form-wrapper">
        <h2>Make a new post!</h2>

        <form action="/posts" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <div class="control">
                    <input class="@error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}">

                    @error('title')
                        <p class="help is-invalid">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description">Tagline</label>
                <div class="control">
                    <input class="@error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description') }}">

                    @error('description')
                        <p class="help is-invalid">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="body">Content</label>

                <div class="control">
                  <textarea class="@error('body') is-invalid @enderror" name="body" rows="8" cols="80" id="body">{{ old('body') }}</textarea>
                  @error('body')
                      <p class="help is-invalid">{{ $message }}</p>
                  @enderror
                </div>
            </div>


            <div class="form-group">
                <label for="tags">Tags</label>

                <div class="control">
                  <select name="tags[]" multiple>
                      @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                      @endforeach
                  </select>
                  @error('tags')
                      <p class="help is-invalid">{{ $message }}</p>
                  @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="control">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
