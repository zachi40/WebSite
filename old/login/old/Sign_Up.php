<?php
include_once 'dbconfig.php';

$username = $_POST['register_username'];
$fname    = $_POST['register_fname'];
$lname    = $_POST['register_lname'];
$email    = $_POST['register_email'];
$pass     = $_POST['register_password'];
$password = hash('sha256', $pass);

// if there's no error, continue to signup

            $query = "INSERT INTO web(userName,fname,lname,email,Password,pic_profile) VALUES('$username','$fname','$lname','$email','$password','default.png')";
            $res = mysql_query($query);

            if ($res) {
                if (!file_exists('path/to/directory')) {
                    mkdir('path/to/directory', 0777, true);
                }

                mkdir("profile/$username", 0700);
                copy("profile/default/default.png","profile/$username/default.png");
                $errTyp = "success";
                $errMSG = "Successfully registered, you may login now";
                echo $errTyp;
            } else {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later...";
                echo $errMSG;
            }
?>



