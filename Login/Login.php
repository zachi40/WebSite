<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);

    // username,fname,lname,email,password,pic_profile
	$query = $DBcon->query("SELECT username, email, password FROM web WHERE email='$email'");
	$row=$query->fetch_array();
	$count = $query->num_rows; // if email/password are correct returns must be 1 row

    if (password_verify(hash('sha256', $password, true),  $row['password']) && $count==1) {
        $_SESSION['userSession'] = $row['username'];
        header("Location: home.php");
    }
    else {
        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
    }

	$DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="bootstrap/css/style.css" type="text/css" />
</head>
<body>

<div class="signin-form">

	<div class="container">
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In.</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
            <input type="email" class="form-control" placeholder="insert Email address" name="email" required />
            <span id="check-e"></span>
        </div>
        
        <div class="form-group">
            <input type="password" class="form-control" placeholder="insert Password" name="password" required />
        </div>
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
            
            <a href="Register.php" class="btn btn-default" style="float:right;"><span class="glyphicon glyphicon-user"></span>  Sign UP</a>
        </div>  
        
       </form>

    </div>
    
</div>

</body>
</html>