<?php
    /* Error */
    function return_error($errMsg){
        header('HTTP/1.1 403 Forbidden', true, 403);
        header('Content-Type: application/json');
        die(json_encode(array("success" => false, "error" => $errMsg)));
    }

    /* Success */
    function return_success($arrobj){
        header('HTTP/1.1 200 OK', true, 200);
        header('Content-Type: application/json');
        die(json_encode($arrobj));
    }

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    /* Check if the user already logged in */
    if(!isset($_SESSION["user"])){
        Header("Location: /index.php");
    }


    /* Connect to Db */
    $mysqldb= new PDO("mysql:host=127.0.0.1;dbname=forums","root","");
    $mysqldb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*
    $cursor = $mysqldb->prepare('SELECT `username`,`Password` FROM `users` WHERE `email`="123@meuhedet.co.il"');
    $cursor->execute();
    $result = $cursor->fetch();
    if (!empty($result)){
        print $result['username'] . " " . $result['Password'];
    }
    else {
        print "Not Found";
    }
    */

    /* Get The input Json */
    $input = json_decode(file_get_contents('php://input'));

    /* If not object */
    if(!is_object($input)){
        return_error("What?");
    }
    /* If not set action */
    if(!isset($input->action)){
        return_error("why?");
    }

    switch ($input->action){

        case "Register":
            $browser=$_SERVER["HTTP_USER_AGENT"];
            $ipaddr= $_SERVER['REMOTE_ADDR'];
            $cursor=$mysqldb->prepare("INSERT INTO `users`(`username`,`password`,`email`,`last_browser`,`last_ipaddr`) VALUES(:usernmae,:password,:email,:browser,:ipaddr)");
            $cursor->execute(array(':usernmae'=> $input->usernmae, ':password'=> $input->password, ':email'=> $input-> email,':browser'=>$browser,':ipaddr'=>$ipaddr));
            return_success(array("success" => true, "msg" =>"success"));
            break;

        case "login":
            $cursor = $mysqldb->prepare('SELECT `username`,`Password` FROM `users` WHERE `email`=":email"');
            $cursor->execute(array(':email'=> $input-> email));
            $result = $cursor->fetch();
            $errMsg="123123";
            die(json_encode(array("success" => false, "error" => $errMsg)));
            //if (!empty($result)){
            //    return_success(array("success" => true, "msg" => $result['username']." ".$result['Password']));
            //}
            //else {
            //    return_error(array("success" => true, "msg" => "Not Found"));
            //}

        case "Forgot_Password":
            $cursor=$mysqldb->prepare("SELECT `email` FROM `users` WHERE email=:email");
            $cursor->execute(array(':email'=> $input->email));

            $password = "123456";
            $to = "zachi40@gmail.com";
            $subject = "Your Recovered Password";

            $message = "Please use this password to login " . $password;
            $headers = "From : vivek@codingcyber.com";
            if(mail($to, $subject, $message, $headers)){
                return_success(array("success" => true, "msg" =>"Your Password has been sent to your email id"));
            }
            else{
                return_error(array("success" => false, "msg" =>"Failed to Recover your password, try again"));
            }


    }
?>