@extends('layout')

@section('content')
    <div id="body-wrapper">
        <h2>Make a new post!</h2>

        <form action="/posts" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <div class="control">
                    <input type="text" name="title" id="title" value="">
                </div>
            </div>

            <div class="form-group">
                <label for="title">Slug</label>
                <div class="control">
                    <input type="text" name="slug" id="slug" value="">
                </div>
            </div>

            <div class="form-group">
                <label for="body">Content</label>

                <div class="control">
                  <textarea name="body" rows="8" cols="80" id="body"></textarea>
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