<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>Admin | Posts</title> 
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
                    <li class="nav-item active"><a class="nav-link" href="{{ route('admin.posts') }}">Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Welcome, Admin</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>

        <section id="main">
            <div class="container">
                <div class="row">
                    @if($posts->count() > 0)
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
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="mt-2">There are no posts to disply.</p>
                    @endif
                </div>
            </div>
        </section>

        <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
