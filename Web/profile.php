<?php
session_start();
include_once 'dbconnect.php';
$currentusername = ($_SESSION['userSession']);
$query = $DBcon->query("SELECT * FROM web WHERE username='$currentusername'");
$userRow=$query->fetch_array();

if(isset($_FILES['btn-image'])){
    $uploadOk = 1;
    $file_name = $_FILES['btn-image']['name'];
    if (empty($file_name)) {
        $msg='<div class="alert alert-danger alert-dismissable"><i class="fa fa-coffee"></i>please choose file.</div>';
        $uploadOk = 0;
    }

    $file_size = $_FILES['btn-image']['size'];
    $file_tmp  = $_FILES['btn-image']['tmp_name'];
    $file_type = $_FILES['btn-image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['btn-image']['name'])));

    $expensions= array("jpeg","jpg","png");

    if((in_array($file_ext,$expensions)=== false)&&($uploadOk !== 0)){
        $msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-coffee"></i>extension not allowed, please choose a JPEG or PNG file.</div>';
        $uploadOk = 0;
    }


    if(($file_size > 2097152) &&($uploadOk !== 0)){
        $msg='<div class="alert alert-danger alert-dismissable"><i class="fa fa-coffee"></i>File size must be excately 2 MB</div>';
        $uploadOk = 0;
    }


    if($uploadOk !== 0){
        $file_name=uniqid().".".$file_ext;
        move_uploaded_file($file_tmp,"profile/".$userRow['username']."/".$file_name);
        $DBcon->query("UPDATE web SET pic_profile='$file_name' WHERE username = '$currentusername'");
        $query = $DBcon->query("SELECT pic_profile FROM web WHERE username='$currentusername'");
        $picRow=$query->fetch_array();
        $picture = '<img src="profile/'.$userRow['username'].'/'.$picRow['pic_profile'].'" width="300vh" height="300vh" class="avatar img-circle" alt="avatar" id="pic_profile" name="pic_profile">';

        $msg='<div class="alert alert-success"><a class="panel-close close" data-dismiss="alert" herf="#close">×</a><i class="fa fa-coffee"></i>Success, the file was upload</div>';
        header("Refresh:1");
    }
}

if(isset($_POST['btn-save'])) {
    $saveok = 1;
    $fname      = strip_tags($_POST['fname']);
    $lname      = strip_tags($_POST['lname']);
    $username   = strip_tags($_POST['username']);

    $pass       = strip_tags($_POST['password']);
    $Confirmpassword     = strip_tags($_POST['Confirmpassword']);
    if ($pass !== $Confirmpassword){
        $msg = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-coffee"></i>password and confirm password does not match</div>';
        $saveok = 0;
    }

    if($saveok !== 0){
        if (!empty($pass)){
        $password = password_hash(hash('sha256', $pass, true), PASSWORD_DEFAULT);
        $DBcon->query("UPDATE web SET username='$username',fname='$fname',lname='$lname',password='$password' WHERE username = '$currentusername'");
        $msg = '<div class="text-center"><div class="alert alert-success"><i class="fa fa-coffee"></i>all parameter was update</div></div> ';
        rename("profile/'$currentusername","$username");
        $_SESSION['userSession'] = $username;
        header("Refresh:1");

        }
        else{
            $DBcon->query("UPDATE web SET username='$username',fname='$fname',lname='$lname' WHERE username = '$currentusername'");
            $msg = '<div class="text-center"><div class="alert alert-success"><i class="fa fa-coffee"></i>all parameter was update</div></div> ';
            $_SESSION['userSession'] = $username;
            rename("profile/$currentusername","profile/$username");
            header("Refresh:0");
        }
    }

}

$picture = '<img src="profile/'.$userRow['username'].'/'.$userRow['pic_profile'].'" width="300vh" height="300vh" class="avatar img-circle" alt="avatar" id="pic_profile" name="pic_profile">';
$DBcon->close();
?>

<!DOCTYPE html>
<!--[if lt IE 7]-->
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
<!--[endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8">
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9">
<![endif]-->
<!--[if gt IE 8]><!-->

<html>
<head>
    <title>Cyb3r</title>

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

    <link rel="stylesheet" href="assets/css/login.css">

    <!-- google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500|Lato:300,400,700,900,300italic,400italic,700italic,900italic|Raleway:400,200,300,500,100|Titillium+Web:400,200,300italic,300,200italic' rel='stylesheet' type='text/css'>

    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/login.js"></script>


</head>
<body>
<div class="container">
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <form class="form-horizontal" method="post" id="image-upload" enctype="multipart/form-data">
                    <?php
                    if (isset($picture)) {
                        echo $picture;
                    }
                    ?>
                    <h6>Upload a different photo...</h6>

                    <input type="file" class="form-control" name="btn-image">
                    <input type="submit" class="btn btn-primary" name="btn-upload" value="Upload Picture">
                </form>
            </div>
        </div>

        <!-- edit form column -->


        <div class="col-md-9 personal-info">
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>

            <h3>Personal info</h3>

            <form class="form-horizontal" method="post" id="register-form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="fname" value="<?php echo $userRow['fname'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="lname" value="<?php echo $userRow['lname'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="email" value="<?php echo $userRow['email'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="username" value="<?php echo $userRow['username'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="password" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="Confirmpassword" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="Save Changes" name='btn-save'>
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel" onclick="history.back()">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>
</body>
</html>