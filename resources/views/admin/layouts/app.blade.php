<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>CRUD APP - @yield('title')</title> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="{{ route('dashboard.show') }}">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('posts.show') }}">Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Welcome, {{ ucfirst($admin->name) }}</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>

        @yield('content')

        <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
