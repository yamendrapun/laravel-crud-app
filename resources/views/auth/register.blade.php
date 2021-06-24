<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Registration</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>
<body>
    <div class="container" >
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <h4>Register | Custom Auth</h4> <hr>
                <form action="{{ route('auth.save')}}" method="POST">
                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail')}}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name')}}">
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span> 
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" value={{ old('email') }}>
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span> 
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span> 
                    </div><br>
                    <button type="submit" class="btn btn-block main-color-bg">Sign Up</button><br>
                    <a href="{{ route('auth.login') }}">I already have an account, sign in</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
