<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>Admin | Dashboard</title> 
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('posts.show') }}">Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Welcome, Admin</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>
        
        <!-- <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown create">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Create Content
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Add Post</a>
                                <a class="dropdown-item" href="#">Add User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header> -->

        <section id="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="active">Welcome to Dashboard.</li>
                </ol>
            </div>
        </section>

        <!-- <section id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active main-color-bg" aria-current="true">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">Posts</a>
                            <a href="#" class="list-group-item list-group-item-action">Users</a>
                        </div>
                    </div>
                    <div class="col-md-10">

                    </div>
                </div>
            </div>
        </section> -->

        <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
