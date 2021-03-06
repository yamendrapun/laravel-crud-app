<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>
<body>
    <div class="container" >
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <h4>Login | Custom Auth</h4> <hr>
                <form action="{{ route('auth.check') }}" method="POST">
                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail')}}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div><br>
                    <button type="submit" class="btn btn-block main-color-bg">Sign In</button><br>
                    <a href="{{ route('auth.register') }}">I don't have an account, create new</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
