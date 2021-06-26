@extends('admin.layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <header class="mt-2">
        <div class="container">
            @if(Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Search posts here...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn main-color-bg"><i class="bi bi-search"></i></button>
                    </span>
                </div>
            </form>
            <!-- <form action="" method="GET">
                <input class="form-control" type="text" placeholder="Type here to search...">
            </form> -->
        </div>
    </header>

    <div class="container">
        <a class="btn main-color-bg m-4" href="{{ route('posts.create') }}"><i class="bi bi-plus-lg"></i> ADD POST</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Post title</th>
                    <th scope="col">Post content</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($posts->count())
                    @foreach($posts as $post)
                        <tr>
                            <td scope="row">{{ $post->title}}</td>
                            <td>{{ $post->content}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <a class="d-inline btn btn-success" href="posts/{{$post->id}}/edit"><i class="bi bi-pencil"></i></a>
                                <form class="d-inline" action="/posts/{{$post->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn main-color-bg"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                <tr><th colspan="4">There are no posts to display.</th></tr>
                @endif
            </tbody>
        </table>    
    </div>
    
@endsection