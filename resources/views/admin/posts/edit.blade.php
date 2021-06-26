@extends('admin.layouts.app')

@section('title')
    Update Post 
@endsection

@section('content')
    <div class="container mt-4">
        <form action="/posts/{{ $post->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Post title</label>
                <input type="text" class="form-control" name="title" id="title" value='{{ $post->title }}'>
                <span class="text-danger">@error('title') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label>Post content</label>
                <textarea name="content" id="content" class="form-control" rows="3">{{ $post->content }}</textarea>
                <span class="text-danger">@error('content') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn main-color-bg">Update</button>
            <a href="/posts" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
