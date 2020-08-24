@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center py-2">
            <div class="col-lg-10">
                <h2>Make a new post!</h2>

                <form action="/posts" method="POST" class="form-container p-3">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="@error('title') is-invalid @enderror form-control" type="text" name="title" id="title" value="{{ old('title') }}">

                        @error('title')
                            <p class="help is-invalid">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Tagline</label>
                        <input class="@error('description') is-invalid @enderror form-control" type="text" name="description" id="description" value="{{ old('description') }}">
                        @error('description')
                            <p class="help is-invalid">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Content</label>

                        <textarea class="@error('body') is-invalid @enderror form-control" name="body" rows="8" cols="80" id="body">{{ old('body') }}</textarea>

                        @error('body')
                            <p class="help is-invalid">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="tags">Tags</label>

                        <select name="tags[]" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <p class="help is-invalid">{{ $message }}</p>
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
