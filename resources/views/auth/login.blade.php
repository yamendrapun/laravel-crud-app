<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous"> -->
</head>
<body>
    <div class="container" >
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <h4>Login | Custom Auth</h4> <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div><br>
                    <button type="submit" class="btn btn-block btn-primary">Sign In</button><br>
                    <a href="{{ route('auth.register') }}">I don't have an account, create new</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
