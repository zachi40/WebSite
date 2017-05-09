<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-zahi.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Zahi Forums</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div class="text-center">
                        <h2><a href="#">Zahi Forums</a></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary" id="login-panel" name="login-panel">
                    <div class="panel-heading text-center">
                        Login
                    </div>
                    <div class="panel-body">
                        <form action="#" method="POST" class="form-signin">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="l_email" type="text" class="form-control" name="l_email" placeholder="Insert Email" required>
                            </div>
                            <div style="display:inline-block;width:100%"></div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="l_password" type="password" class="form-control" name="l_password" placeholder="insert Password" required>
                            </div>
                            <div style="display:inline-flex;width:10%"></div>
                            <div class="input-group">
                                <span><input type="checkbox" id="Remober_Me" name="Remober_Me"> Remember me</span>
                            </div>
                            <div style="display:inline-block;width:100%"></div>
                            <button type="submit" class="btn btn-primary btn-block" id="L_Login" name="L_Login">login</button>
                            <h3><span class="label label-info pull-left" id="L_Forgot_Password" name="L_Forgot_Password" data-toggle="modal" data-target="#Forgot_Password">
                                <i class="glyphicon glyphicon-repeat"></i> Forgot Password?</a></span></h3>
                            <h3><span class="label label-default pull-right" id="L_Register" name="L_Register"><i class="glyphicon glyphicon glyphicon-user"></i> Register</a></span></h3>
                        </form>
                    </div>
                </div>
                <div class="panel panel-success" id="register-panel" name="register-panel" hidden>
                    <div class="panel-heading text-center">
                        Register
                    </div>
                    <div class="panel-body">
                        <form action="#" method="POST" id="register-form" name="register-form">
                            <div style="display:inline-block;width:100%"></div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="r_username" type="text" class="form-control" placeholder="Insert Username"  name="r_username" id="r_username">
                            </div>
                            <div style="display:inline-block;width:100%"></div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="r_email" type="email" class="form-control" placeholder="Insert Email" name="r_email" id="r_email">
                            </div>
                            <div style="display:inline-block;width:100%"></div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="r_password" type="password" class="form-control" placeholder="Insert Password" name="r_password" id=r_password">
                            </div>
                            <div style="display:inline-block;width:100%"></div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="r_password_repeat" type="password" class="form-control" placeholder="Repeat Password"  name="r_password_repeat" id="r_password_repeat">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success btn-block" id="R_Register" name="R_Register">Register</button>
                            <h3><span class="label label-primary pull-left" id="R_Login" name="R_Login"><i class="glyphicon glyphicon glyphicon-user"></i> Login</a></span></h3>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Forgot_Password" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center">Reset Password</h3>
                </div>
                <form action="#" method="POST">
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="email" class="form-control text-center" placeholder="Insert Email" id="Forgot_Password_Email" name="Forgot_Password_Email" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default btn-center" id="Forgot_Password_Submit" name="Forgot_Password_Submit">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#R_Login").click(function() {
            $("#register-panel").fadeOut("1000");
            $("#login-panel").delay(1000).fadeIn("1000");
        });

        $("#L_Register").click(function() {
            $("#login-panel").fadeOut("1000");
            $("#register-panel").delay(1000).fadeIn("1000");
        });

        $('document').ready(function() {
            $("#R_Register").click(function(){
                $.ajax({
                    url: "api.php",
                    type: "POST",
                    data: '{"action":"Register","usernmae":"'+r_username.value+'","password":"'+r_password.value+'","email":"'+r_email.value+'"}',
                    dataType: "json",
                    contentType: "application/json",
                    success: function (data)
                    {
                        console.log(data);
                    },
                    error: function (data)
                    {
                        console.error(data);
                    }
                });
            });
            $("#L_Login").click(function(){
                $.ajax({
                    url: "api.php",
                    type: "POST",
                    data: '{"action":"login","email":"eliav.f@meuhedet.co.il","password":"123"}',
                    dataType: "json",
                    contentType: "application/json",
                    success: function (data){
                        console.log(data);
                    },
                    error: function(data){
                        alert(data);
                    }
                });
            });
            $("#Forgot_Password_Submit").click(function(){
                $.ajax({
                    url: "api.php",
                    type: "POST",
                    data: '{"action":"Forgot_Password","email":"'+Forgot_Password_Email.value+'"}',
                    dataType: "json",
                    contentType: "application/json",
                    success: function (data)
                    {
                        alert(data);
                    },
                    error: function (data)
                    {
                        alert(data);
                    }
                });
            });

        });


    </script>
</body>
</html>