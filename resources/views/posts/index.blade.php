<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>Posts List</title> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{ route('posts.show') }}">Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                </ul>                                                                                   
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Welcome, {{ ucfirst($admin->name) }}</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>

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

        <section id="main">
            <div class="container">
                <div class="row">

                    <a class="btn main-color-bg m-4" href="{{ route('posts.create') }}"><i class="bi bi-plus-lg"></i> ADD POST</a>

                    @if($posts->count())
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Post title</th>
                                    <th scope="col">Post content</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">{{$post->id}}</th>
                                        <td>{{ $post->title}}</td>
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
                            </tbody>
                        </table>
                    @else
                        <p class="m-2 ">There are no posts to display.</p>
                    @endif
                </div>
            </div>
        </section>

        <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
