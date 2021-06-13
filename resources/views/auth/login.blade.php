<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E - Book | Login</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('front_files/dist/css/bootstrap.min.css')}}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('front_files/dist/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--vendor css-->
    <link rel="stylesheet" href="{{asset('front_files/dist/css/vendor.min.css')}}">

    <!--main styles-->
    <link rel="stylesheet" href="{{asset('front_files/dist/css/main.min.css')}}">
</head>
<body>
<div class="login">
    <div class="login-bg"></div>

    <div class="container">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <h2 class="text-center"><span class="text-primary">E-</span>Bo<span class="text-primary">OK</span> Login </h2>

                <div><hr></div>
                <div class="col">

                    <a href="/login/facebook" class="fb btn">
                        <i class="fa fa-facebook"></i> Login with Facebook
                    </a>
                    <a href="/login/twitter" class="twitter btn">
                        <i class="fa fa-twitter"></i> Login with Twitter
                    </a>
                    <a href="/login/google" class="google btn">
                        <i class="fa fa-google"></i> Login with Google+
                    </a>
                </div>

                <div class="col">


                    <input type="text" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="submit" value="Login">
                </div>
                <div><hr></div>
                <div class="row">

                    <div class="col-md-6">
                        <a href="register.html"  class="btn btn-dark">Sign up</a>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#"  class="btn btn-dark">Forget Password</a>
                    </div>
                </div>

            </div>
        </form>

    </div>



</div>





<script src="{{asset('front_files/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front_files/dist/js/jquery.min.js')}}"></script>

<script src="{{asset('front_files/dist/js/vendor.min.js')}}"></script>
<script src="{{asset('front_files/dist/js/main.min.js')}}"></script>
</body>

</html>
