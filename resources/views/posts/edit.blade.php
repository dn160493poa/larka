@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('post.update',  $post->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="title" class="form-label"></label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" value="{{$post->title}}">
                    <div id="titleHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" name="content" class="form-control" id="content" aria-describedby="contentHelp" value="{{$post->content}}">
                    <div id="contentHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name="image" class="form-control" id="image" aria-describedby="imageHelp" value="{{$post->image}}">
                    <div id="imageHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
