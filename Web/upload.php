<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
	header("Location: index.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
    $fname    = strip_tags($_POST['fname']);
    $lname    = strip_tags($_POST['lname']);
    $username = strip_tags($_POST['username']);
    $email    = strip_tags($_POST['email']);
    $pass     = strip_tags($_POST['password']);
    $password = password_hash(hash('sha256', $_POST['password'], true), PASSWORD_DEFAULT);


    $fname = $DBcon->real_escape_string($fname);
    $lname = $DBcon->real_escape_string($lname);
    $username = $DBcon->real_escape_string($username);
    $email = $DBcon->real_escape_string($email);
    $password = $DBcon->real_escape_string($password);
	
	$check_email = $DBcon->query("SELECT email FROM web WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		$query = "INSERT INTO web(username,fname,lname,email,password,pic_profile) VALUES('$username','$fname','$lname','$email','$password','default.png')";

		if ($DBcon->query($query)) {
            if (!file_exists("profile/$username")) {
                mkdir("profile/$username", 0777, true);
            }

            copy("profile/default/default.png","profile/$username/default.png");
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered !
					</div>";
            header('Refresh: 1; URL=login.php');
		}
		else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering !
					</div>";
		}
	}
	else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry email already taken !
				</div>";
			
	}
	
	$DBcon->close();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cyb3r</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/login.css" type="text/css" />
</head>
<body>

<div class="signin-form">

	<div class="container">
        
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
       <div class="form-group">
           <input type="text" class="form-control" placeholder="Insert a Username" name="username" required />
       </div>
       <div class="form-group">
           <input type="text" class="form-control" placeholder="Insert a First Name" name="fname" required />
       </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Insert a Last Name" name="lname" required />
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Insert a Email Address" name="email" required />
            <span id="check-e"></span>
        </div>
        
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Insert a Password" name="password" required />
        </div>
        
     	<hr />
        
        <div class="form-group">
            <div class="text-center">
                <button type="submit" class="btn btn-default" name="btn-signup">
                    <span class="glyphicon glyphicon-log-in"></span>    Create Account
                </button>
            </div>

            <!-- <a href="login.php" class="btn btn-default" style="float:right;"><span class="glyphicon glyphicon-user"></span>  Log In Here</a> -->
        </div>
      
      </form>

    </div>
    
</div>

</body>
</html>