<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/toastr.min.css') }}">
<script src="{{ asset('dist/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/js/toastr.min.js') }}"></script>
</head>

<body>

<div id="main">

	<section class="main-login--page">
    	<div class="login-wrapper left-content">
        	<div class="login-logo">
            	Admin
            </div>
            <div class="login-content--wrapper">
                <h1 class="login-title">
                    <b>Aplikasi InvenPutri</b><br>Badan Usaha Milik Putri<br>Ujikom 2019
                </h1>
            </div><!-- login-content--wrapper -->
            <footer class="login-footer">
            	Lorem Ipsum is simply dummy text ofthe printing<br>and typesetting industry.
            </footer>
        </div>
        <div class="login-wrapper right-content">
        	<div class="login-content--wrapper">
            	<h2>Sign In</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                	<div class="form-group">
                    	<span class="icon ti-user"></span>
                    	<input class="form-control login-form" type="text" placeholder="Username" required name="email">
                    </div>
                    <div class="form-group">
                    	<span class="icon ti-lock"></span>
                    	<input class="form-control login-form" type="password" placeholder="Password" required name="password">
                    </div>
                    <button type="submit" class="btn btn-primary login-btn">Sign In</button>
                    <a class="link forgot-password" data-toggle="modal" data-target="#forget-modal">Forgot Password?</a>
                </form>
            </div><!-- login-content--wrapper -->
        	
        </div>
    </section>
    
    
    
</div><!-- main -->
@include('alert')
</body>
</html>
