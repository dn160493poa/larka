@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('post.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp">
                    <div id="titleHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" name="content" class="form-control" id="content" aria-describedby="contentHelp">
                    <div id="contentHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name="image" class="form-control" id="image" aria-describedby="imageHelp">
                    <div id="imageHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
