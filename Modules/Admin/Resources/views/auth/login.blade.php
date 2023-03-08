<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , shrink-to=fitt=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="">
    <meta name="description">
    <title>Login system</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0"
        href="{{ asset('template_admin/styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_admin/styles/extras.1.1.0.min.css') }}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin/adminlogin.css') }}" />

</head>

<body>

    <form action="" class="form-signin" method="POST">
        @csrf
        <div class="page">
            <div class="container">
                <div class="left">
                    <div class="login">Login</div>
                    <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to
                        read</div>
                </div>
                <div class="right">
                    <svg viewBox="0 0 320 300">
                        <defs>
                            <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992"
                                x2="307" y2="193.49992" gradientUnits="userSpaceOnUse">
                                <stop style="stop-color:#ff00ff;" offset="0" id="stop876" />
                                <stop style="stop-color:#ff0000;" offset="1" id="stop878" />
                            </linearGradient>
                        </defs>
                        <path
                            d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                    </svg>
                    <div class="form">
                        <label for="inputEmail">Email</label>

                        <input type="email" id="email" name="email" required placeholder="" autofocus>
                        <label for="inputPassword">Password</label>

                        <input type="password" id="passwork" name="password" class="mb-4" required placeholder=""
                            autofocus>

                        <button class="btn btn btn-primary btn-block" type="submit">Đăng nhập</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('assets/js/admin/adminlogin.js') }}" type="text/javascript"></script>

</body>
@yield('script')


</html>
