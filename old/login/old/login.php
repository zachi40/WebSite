<?php
include_once 'dbconfig.php';
?>

<!doctype html>
<html>
<head>
    <title>Cyb3r</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    section#login{
        background: url(assets/images/cybermap.jpg) no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-position: 50% -50px;
    }
    .login-register-form-section {
        max-width: 350px;
        margin: 0 auto;
    }
    .login-register-form-section i {
        width: 10px;
    }
    .login-register-form-section .nav-tabs > li > a {
        color: #2abb9b;
    }
 
    .login-register-form-section .nav-tabs > li.active > a {
        background-color: #2abb9b;
        border-color: #2abb9b;
        color: white;
    }
    .login-register-form-section .nav-tabs > li > a, 
    .login-register-form-section .nav-tabs > li.active > a {
        width: 160px;
        text-align: center; 
        border-radius: 0;
    }
    .login-register-form-section .nav-tabs {
        padding-bottom: 10px;
        margin-bottom: 10px;
    }
    .login-register-form-section .btn-custom {
        width: 100%;
        background-color: #2abb9b;
        border-color: #2abb9b;
        margin-bottom: 0.5em;
        border-radius: 0;
    }
    .login-register-form-section .btn-custom:hover {
        width: 100%;
        background-color: #48A497;
        border-color: #2abb9b;
    }
    .login-register-form-section .form-group {
        padding: 0 20px;
    }
</style>

    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font_icon/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/font_icon/css/helper.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500|Lato:300,400,700,900,300italic,400italic,700italic,900italic|Raleway:400,200,300,500,100|Titillium+Web:400,200,300italic,300,200italic' rel='stylesheet' type='text/css'>

    <script src="assets/js/modernizr.js"></script>
</head>
<body>
    <header>
    <div class="row">
        <div class="container">
            <div class="login-register-form-section">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#register" data-toggle="tab">Register</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="login">
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group " >
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="login_email" class="form-control" placeholder="Username or email" required="required" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="password" name="login_password" class="form-control" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="rememberMe">
                                <label for="rememberMe">Remember Me</label>
                                <a href="#" class="pull-right">Forgot password?</a>
                            </div>  
                            <input type="submit" value="Login" class="btn btn-success btn-custom">

                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="register">
                        <form class="form-horizontal" action="Sign_Up.php" method="post" enctype="multipart/form-data">
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                    <input type="text" name="register_fname" class="form-control" placeholder="First Name" required="required" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                    <input type="text" name="register_lname" class="form-control" placeholder="Last Name" required="required" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="register_username" class="form-control" placeholder="USername" required="required" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" name="register_email" class="form-control" placeholder="Email" required="required" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" name="register_password" class="form-control" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" name="register_cpassword" class="form-control" placeholder="Confirm Password" required="required">
                                </div>
                            </div>
                            <input type="submit" value="Register" class="btn btn-success btn-custom">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </header>
<body>
</html>