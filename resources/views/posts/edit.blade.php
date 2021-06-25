<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>Posts Edit</title> 
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
                    <li class="nav-item"><a class="nav-link" href="#">Welcome, Admin</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>

        <section id="main">
            <div class="container mt-4">
                    <form action="/posts/{{ $post->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" id="title" value={{ $post->title }}>
                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="content" class="form-control" rows="3">{{ $post->content }}</textarea>
                            <span class="text-danger">@error('content') {{ $message }} @enderror</span>
                        </div>
                        <button type="submit" class="btn main-color-bg">Update</button>
                    </form>
                </div>
            </div>
        </section>

        <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
