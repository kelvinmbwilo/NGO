<!DOCTYPE html>
<!--
Beyond Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3
Version: 1.0.0
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    <!--Basic Styles-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="{{ URL::current() }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link href="{{ asset('assets/css/beyond.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
    <link id="skin-link" href="{{ URL::current() }}" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="{{ asset('assets/js/skins.min.js') }}"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
<div class="login-container animated fadeInDown">
<br><br><br>
<div class="row">

    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <p style='text-align:center'> SIGN IN</p>
                <form method="post" action="{{ url('login') }}" style="" autocomplete="off">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" id="email" type="text" class="form-control" placeholder="Username" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password"  required="required" />
                        <div class="form-group">
                            <input type="checkbox" name="keep"> Keep me logged In

                            &nbsp;&nbsp;&nbsp;<a href="#">Forgot Password?</a>
                        </div>

                        <input type="submit" class="btn btn-primary btn-block" value="Login">
                </form>
                <div class="logobox">
                    @if(isset($error))
                        <div class="alert alert-danger alert-dismissable" style="padding: 5px">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>{{ $error }}!</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!--Basic Scripts-->
<script src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!--Beyond Scripts-->
<script src="{{ asset('assets/js/beyond.min.js') }}"></script>


</body>
<!--Body Ends-->
</html>
