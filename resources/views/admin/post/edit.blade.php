@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('admin.post.update',  $post->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="title" class="form-label"></label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" value="{{$post->title}}">
                    <div id="titleHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control" id="content">{{$post->content}}</textarea>
                    <div id="contentHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name="image" class="form-control" id="image" aria-describedby="imageHelp" value="{{$post->image}}">
                    <div id="imageHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="category"></label>
                    <select id ="category" name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        @foreach($categories as $category)
                            <option
                                {{$category->id === $post->category->id ? 'selected' : ''}}
                                value="{{$category->id}}">{{$category->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tags"></label>
                    <select class="form-control" multiple id="tags" name="tags[]">
                        @foreach($tags as $tag)
                            <option
                                @foreach($post->tags as $post_tag)
                                    {{$tag->id === $post_tag->id ? 'selected' : ''}}
                                @endforeach
                                value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
