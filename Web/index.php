<?php
/* Functions we used */
function check_input($data, $problem=''){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0){
        $msg ='<div class="center">
                    <div class="alert alert-danger alert-dismissable"><i class="fa fa-coffee"></i>
                            '.$problem;'
                    </div>
		        </div>';
        #show_error($problem);
    }
    return $data;
}

    session_start();
    include_once 'dbconnect.php';
    if (isset($_SESSION['userSession'])){
        $username = ($_SESSION['userSession']);
       $query = $DBcon->query("SELECT * FROM web WHERE username='$username'");
       $userRow=$query->fetch_array();
       $DBcon->close();
    }
if(isset($_POST['btn-Contact'])){


    /* Set e-mail recipient */
    $myemail  = "zachi40@walla.com";

    /* Check all form inputs using check_input function */
    $yourname = check_input(strip_tags($_POST['post_name']), "Enter your name");
    $subject  = "From Web";
    $email    = check_input($_POST['post_email']);
    $website  = check_input($_POST['post_Website']);
    $comments = check_input($_POST['post_email'], "Write your comments");

/* If e-mail is not valid show error message */
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)){
        $msg ='<div class="center"><div class="alert alert-danger alert-dismissable"><i class="fa fa-coffee"></i>E-mail address not valid</div></div>';
    }

    /* If URL is not valid set $website to empty */
    if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website)){
        $website = '';
    }

    /* Let's prepare the message for the e-mail */
    $message = "Hello!
    Your contact form has been submitted by:
    Name: $yourname
    E-mail: $email
    URL: $website
    Comments:
    $comments
    ";

    /* Send the message using mail() function */
    mail($myemail, $subject, $message);

}
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
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500|Lato:300,400,700,900,300italic,400italic,700italic,900italic|Raleway:400,200,300,500,100|Titillium+Web:400,200,300italic,300,200italic' rel='stylesheet' type='text/css'>

        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/login.js"></script>

    </head>
    <body id="body">
        <!--[if lt IE 7]>
                <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://outdatedbrowser.com/en/" target="_blank">upgrade your browser</a>
                                       to improve your experience.</p>
        <![endif]-->

        <!-- Header area -->
        <header id="header">
            <div class="center text-center">
                <h1 class="bigheadline">w3lc0m3 70 MY cyb3r p463 </h1>
                <h4 class="subheadline">if you do not know what you are doing escape from here</h4>
            </div>
            <div class="bottom">
                <a data-scroll href="#sitehacked" class="scrollDown animated pulse" id="scrollToContent"><i class="pe-7s-angle-down-circle pe-va"></i></a>
            </div>
        </header>

        <!-- Navigation area -->
        <section id="navigation">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#body">CYB3R</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#body">H0M3</a></li>
                            <li><a href="#sitehacked">5173H4CK3D</a></li>
                            <li><a href="#contact">C0N74C7</a></li>
                            <li><a href="#footer">F1NDU5</a></li>
                            <li>
                                <?php
                                if (isset($_SESSION['userSession'])){
                                    echo '<a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; L060U7</a>';
                                }
                                else{
                                    echo '<a href="login.php">L061N</a>';
                                }
                                ?>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </section>

        <!-- services section -->
        <section id="login" class="service-area">
            <div class="container">
                <h2 class="block_title">Profile</h2>
                <div class="col-xs-12">
                    <div class="text-center">

                        <?php
                        if (isset($_SESSION['userSession'])) {
                            echo '<img src=profile/'.$userRow['username'].'/'.$userRow['pic_profile'].' class="img-circle img-thumbnail"  width="315" height="395" alt="profile">' ;
                        }
                        else{
                            echo '<img src="profile/default/default.png" class="img-circle img-thumbnail"  Profile">';
                        }
                        ?>

                    </div>
                </div>
                <div class="col-xs-12">
                        <div class="text-center">
                            <h2 class="con-title">
                                <?php
                                if (isset($_SESSION['userSession'])) {
                                    echo "Hello ". $userRow['fname']." " .$userRow['lname'];
                                }
                                else{
                                    echo "Hello Anonymous";
                                }
                                ?>
                            </h2>
                        </div>
                </div>
                <?php
                if (isset($_SESSION['userSession'])) {
                    echo '<div class="col-xs-12">
                            <div class="btn-center">
                                <a href="profile.php" class="big button">Edit Profile</a>
                            </div>
                          </div>';
                }
                ?>

            </div>
        </section><!-- services -->

        <!-- Portfolio Area -->
        <section id="sitehacked" class="portfolio-area">
            <div class="container">
                <h2 class="block_title">Website Hacked</h2>
                <div class="row port cs-style-3">
                    <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                        <figure>
                            <img src="assets/images/portfolio1.jpg" alt="img04">
                            <figcaption>
                                <h3>Settings</h3>
                                <span>Jacob Cummings</span>
                                <a href="#" class="button" >Take a look</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                        <figure>
                            <img src="assets/images/portfolio2.jpg" alt="img01">
                            <figcaption>
                                <h3>Camera</h3>
                                <span>Jacob Cummings</span>
                                <a href="#" class="button" >Take a look</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                        <figure>
                            <img src="assets/images/portfolio3.jpg" alt="img02">
                            <figcaption>
                                <h3>Music</h3>
                                <span>Jacob Cummings</span>
                                <a href="#" class="button" >Take a look</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                        <figure>
                            <img src="assets/images/portfolio4.jpg" alt="img04">
                            <figcaption>
                                <h3>Settings</h3>
                                <span>Jacob Cummings</span>
                                <a href="#" class="button" >Take a look</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                        <figure>
                            <img src="assets/images/portfolio5.jpg" alt="img01">
                            <figcaption>
                                <h3>Camera</h3>
                                <span>Jacob Cummings</span>
                                <a href="#" class="button" >Take a look</a>
                            </figcaption> 
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                        <figure>
                            <img src="assets/images/portfolio6.jpg" alt="img02">
                            <figcaption>
                                <h3>Music</h3>
                                <span>Jacob Cummings</span>
                                <a href="#" class="button" >Take a look</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-center"><a href="https://sucuri.net/website-security/website-hacked-report" class="big button">View all</a></div>
                    </div>
                </div>
            </div><!-- container -->
        </section>

        <!-- Contact Area -->
        <section id="contact" class="mapWrap">
            <div id="cyberMap" style="width:100%;"></div>
            <div id="contact-area">
                <div class="container">
                    <h2 class="block_title">Hey !!!</h2>
                    <div class="row">
                        <div class="col-xs-12">
                        </div>
                        <div class="col-sm-6">
                            <div class="moreDetails">
                                <h2 class="con-title">More About me</h2>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum animi repudiandae nihil aspernatur repellat temporibus doloremque sint ea laboriosam, excepturi iure inventore rerum voluptatibus, suscipit totam, sit necessitatibus. Rerum, blanditiis. </p>
                                <ul class="address">
                                    <li><i class="pe-7s-map-marker"></i><span>bla bla bla,<br>Washington, DC 20500,<br>United States</span></li>
                                    <li><i class="pe-7s-mail"></i><span>Hacker@Hacker.com</span></li>
                                    <li><i class="pe-7s-phone"></i><span>+0-123-456-789</span></li>
                                    <li><i class="pe-7s-global"></i><span><a href="https://www.google.co.il/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwi1o-78xO7SAhXrAMAKHWPVA2kQFggiMAA&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FHacker&usg=AFQjCNGaEsG8SfJdmOSsdcA9l8LPHuZcxw&sig2=_tmqQq3sC4_E7_7p6o1DfQ&bvm=bv.150475504,bs.1,d.d24">www.WhatIsHacker.com</a></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h2 class="con-title">Drop us a WebSite</h2>
                            <form role="form" method="post" id="image-upload" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" class="form-control" id="post_name" name="post_name" placeholder="Enter your name" required>
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control" id="post_email" name="post_email" placeholder="Enter your email">
                              </div>
                              <div class="form-group">
                                    <input type="Text" class="form-control" id="post_Website" name="post_Website" placeholder="Enter your Website">
                              </div>
                              <div class="form-group">
                                <textarea name="InputMessage" id="post_message" name="post_message" class="form-control" rows="5" required></textarea>
                              </div>
                                <div class="form-group">
                                    <div class="center">
                                        <?php
                                        if(isset($msg)){
                                            echo $msg;
                                        }
                                        ?>
                                    </div>
                                        <button type="submit" class="btn medium" name="btn-Contact">Let us Hacked</button>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div><!-- container -->
            </div><!-- contact-area -->
            <div id="social">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="scoialinks">
                                <li class="normal-txt">Find me on</li>
                                <li class="social-icons"><a class="facebook" href="https://facebook.com/"></a></li>
                                <li class="social-icons"><a class="twitter" href="https://twitter.com/?lang=en"></a></li>
                                <li class="social-icons"><a class="linkedin" href="https://www.linkedin.com/"></a></li>
                                <li class="social-icons"><a class="google-plus" href="https://plus.google.com/?hl=iw"></a></li>
                                <li class="social-icons"><a class="wordpress" href="https://en.wordpress.org"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- social -->
        </section>
        <!-- Footer Area -->

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="copyright">© Copyright 2017 <a href="#body">Cyber</a></p>
                    </div>
                    <div class="col-sm-6">
                        <p class="designed">Theme for <a href="https://www.google.co.il/search?site=&source=hp&q=fun&oq=fun&gs_l=hp.3...1524.1757.0.2284.0.0.0.0.0.0.0.0..0.0....0...1c.1.64.hp..0.0.0.oPcLtBUEuP8"
                                                         target="_blank">Fun!</a></p>
                    </div>
                </div>
            </div>
        </footer
        <!-- END # MODAL LOGIN -->


        <!-- Necessery scripts -->
        <script src="assets/js/jquery-2.1.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script src="assets/js/jquery.actual.min.js"></script>
        <script src="assets/js/smooth-scroll.js"></script>
        <script src="assets/js/owl.carousel.js"></script>
        <script src="assets/js/script.js"></script>

    </body>
</html>

