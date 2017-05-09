<?php
function upload_file($username) {
    $target_dir = "prfile/$username/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $msg='
                <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert" herf="#close">×</a>
                    <i class="fa fa-coffee"></i>This is an <strong>.alert</strong>. "File is not an image.".
                </div>
            ';
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    }
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        }
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

session_start();
include_once 'dbconnect.php';

if(isset($_POST['btn-upadte'])) {
    echo "update";
    $fname    = strip_tags($_POST['fname']);
    $lname    = strip_tags($_POST['lname']);
    $username = strip_tags($_POST['username']);
    $pass     = strip_tags($_POST['password']);
    $password = password_hash(hash('sha256', $_POST['password'], true), PASSWORD_DEFAULT);

    upload_file($username);

    $fname = $DBcon->real_escape_string($fname);
    $lname = $DBcon->real_escape_string($lname);
    $username = $DBcon->real_escape_string($username);
    $password = $DBcon->real_escape_string($password);

}

$username = ($_SESSION['userSession']);
$query = $DBcon->query("SELECT * FROM web WHERE username='$username'");
$userRow=$query->fetch_array();
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
                <img src="<?php echo 'profile/'.$userRow['username'].'/'.$userRow['pic_profile'] ?>" width="300vh" height="300vh" class="avatar img-circle" alt="avatar">
                <h6>Upload a different photo...</h6>

                <input type="file" class="form-control">
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

            <!-- <form class="form-horizontal" method="post" id="register-form"> -->
            <form class="form-signin" method="post" id="register-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?php echo $userRow['fname'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?php echo $userRow['lname'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?php echo $userRow['email'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="<?php echo $userRow['username'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="button" class="btn btn-primary" value="Save Changes" name="btn-upadte" id="btn-upadte">
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