<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
    <section class="bg-login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card">
                            <!-- <img src="assets/images/login_logo.png" class="img-fluid" alt=""> -->
                           
                            @if(\Session::get('message'))
                            <div class="mb-3">
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <div class="alert-body">
                                        {{ \Session::get('message') }}
                                    </div>
                                </div>
                            </div> 
                            @endif
                            <form class="login-form" method="post" action="{{url('login')}}">
                             @csrf
                             <div class="mb-3">
                                <input type="email" class="form-control form-control-user" placeholder="Email address" name="email" maxlength="50" autocomplete="off" >
                                <div class="text-danger">@error('email') {{$message}} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <input type="password" placeholder="Password" class="form-control form-control-user" name="password">
                                <div  class="text-danger">@error('password') {{$message}} @enderror</div>
                            </div>
                                <button type="submit" class="btn btn-dark">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
