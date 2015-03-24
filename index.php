<?php
session_start();

date_default_timezone_set("America/New_York");
require 'lib/mysql.php';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['userid'])){
    $sql = 'SELECT `FirstName`, `LastName` FROM `user` WHERE `id`="'.$_SESSION["userid"].'"';
   $result =  mysqli_query($con, $sql);
    if(!$result){
        session_destroy();
        header('Location: index.php');
        exit();
    }
    else{
        $row = mysqli_fetch_array($result);
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Love INC</title>
    <meta name="description" content="Love In The Name of Christ (Love INC)">
    <meta name="author"
          content="Alex Johnson, David Poling, and Melanie Meister">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Web Fonts -->
    <link
        href='http://fonts.googleapis.com/css?family=Comfortaa:400,700&amp;Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext'
        rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300'
          rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome CSS -->
    <link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet"/>

    <!-- Plugins -->
    <link href="css/animations.css" rel="stylesheet"/>

    <link href="css/animate.css" rel="stylesheet"/>

    <!-- Worthy core CSS file -->
    <link href="css/style.css" rel="stylesheet"/>

    <!-- Custom css -->
    <link href="css/custom.css" rel="stylesheet"/>

    <!-- jQuery UI CSS -->
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css"/>

</head>

<body class="no-trans">
<noscript class="text-center">
    <h1>Javascript Disabled!</h1>

    <p>
        <strong>Javascript has been disabled on your browser, please enable it to access the content of this
            website.</strong>
    </p>
    <style type="text/css">
        #body {
            display: none;
        }
    </style>
</noscript>

<!--Facebook Widget-->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=825907460758802&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="icon-up-open-big"></i>
</div>

<!-- header start -->
<!-- ================ -->
<span id="body">
    <header class="header fixed clearfix navbar navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <!-- header-left start -->
                    <!-- ================ -->
                    <div class="header-left clearfix">

                        <!-- logo -->
                        <div class="logo smooth-scroll">
                            <a href="#home"><img id="logo" src="images/logo.png" alt="Love INC"></a>
                        </div>

                        <!-- name-and-slogan -->
                        <div class="site-name-and-slogan smooth-scroll">
                            <div class="site-name">
                                <a href="#home">Love INC</a>
                            </div>
                            <div class="site-slogan">Love In The Name of Christ</div>
                        </div>

                    </div>
                    <!-- header-left end -->

                </div>
                <div class="col-md-8">

                    <!-- header-right start -->
                    <!-- ================ -->
                    <div class="header-right clearfix">

                        <!-- main-navigation start -->
                        <!-- ================ -->
                        <div class="main-navigation animated">

                            <!-- navbar start -->
                            <!-- ================ -->
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">

                                    <!-- Toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle"
                                                data-toggle="collapse" data-target="#navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse scrollspy smooth-scroll"
                                         id="navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li class="active"><a href="#home">Home</a></li>
                                            <?php
                                            $sql = 'SELECT * FROM `section` ORDER BY `order`';
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<li><a href="#' . $row["slug"] . '">' . $row["name"] . '</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!-- navbar end -->

                        </div>
                        <!-- main-navigation end -->

                    </div>
                    <!-- header-right end -->

                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- banner start -->
    <!-- ================ -->
    <div id="home" class="banner">
        <div class="banner-image"></div>
        <div class="banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
                        <h1 class="text-center"></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->
<div class="wrap">
    <div class="container">
        <?php
        $sql = "SELECT * FROM section ORDER BY `order`";
        $result = mysqli_query($con, $sql);
        $count = 1;
        while ($section = mysqli_fetch_array($result)) {
            ?>
            <div id="<?php echo $section['slug']; ?>" class="section object-non-visible
            <?php if ($count % 2 != 0) {
                echo " sectionColor";
            } ?>"
                 data-animation-effect="fadeIn">

                <?php
                //About us section
                if (strcmp($section['slug'], "about-us") == 0) {
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-center"><?php echo $section['name']; ?></h1>
                            <?php
                            echo $section['content'];
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php
                            $sql = "SELECT info FROM info WHERE name='Facebook'";
                            $query = mysqli_query($con, $sql);
                            ?>
                            <div class="fb-like-box" data-href="<?php echo mysqli_fetch_array($query)['info'] ?>"
                                 data-colorscheme="light"
                                 data-show-faces="true" data-header="true" data-stream="true"
                                 data-show-border="true"></div>
                        </div>
                    </div>
                <?php } //Calendar section
                else if (strcmp($section['slug'], "calendar") == 0) { ?>
                    <div class="text-center">
                        <h1><?php echo $section['name']; ?></h1>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                    src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=se84kndcbippuj0tqcrv7e66tg%40group.calendar.google.com&amp;color=%230F4B38&amp;ctz=America%2FNew_York"
                                    style=" border-width:0;background-color:#E1FAF2" frameborder="0" scrolling="no"
                                    align="center"></iframe>
                        </div>
                    </div>
                <?php } //Donors section
                else if (strcmp($section['slug'], "donors") == 0) { ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-center"><?php echo $section['name']; ?></h1>
                            <?php
                            echo $section['content'];
                            ?>
                        </div>
                        <div class="col-md-4">
                            <!--Amazon Smile Link-->
                            <div id="amznCharityBanner"
                                 style='width: 300px !important; height: 250px !important; text-align: center !important; position: relative; background-image: url("https://d1ev1rt26nhnwq.cloudfront.net/ccmtblv2.png") !important; background-repeat: no-repeat !important;'>
                                <a target="_blank"
                                   style="padding: 100px 10px !important; left: 0px !important; top: 0px !important; right: 0px !important; bottom: 0px !important; position: absolute !important;"
                                   href="http://smile.amazon.com/ch/38-2765855">
                                    <div id="bannerTextWrapper" style="height: 100%; overflow: hidden;"><span
                                            style="height: 100%; vertical-align: middle; display: inline-block;"></span><span
                                            style="margin: 0px; width: 95%; color: black !important; line-height: 26px; overflow: hidden; font-family: Arial; font-size: 26px; text-decoration: none; vertical-align: middle; display: inline-block;">Love Inc Of Jackson County Area</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php
                } else {
                    ?>
                    <h1 class="text-center"><?php echo $section['name']; ?></h1>
                    <?php
                    echo $section['content'];
                    ?>
                <?php
                }
                ?>
            </div>
            <?php
            $count++;
        } ?>
    </div>
</div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-xs">
                    Copyright &copy; <?php echo date("Y"); ?> Love INC of Jackson
                </div>
                <div class="col-md-4 col-xs-6">
                    <h3>Contact Info</h3>
                </div>
                <div class="col-md-4 col-xs-1">
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="text-muted">Logged in as </span><?php echo $firstName . " " . $lastName; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn" id="logoutBtn">
                                    Logout
                                </button>
                            </div>
                        </div>
                        <?php } else {
                        ?>
                        <button type="button" class="btn" data-toggle="modal" data-target="#loginModal">
                            Login
                        </button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modals -->
    <?php if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) { ?>
        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="loginLabel">Login</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div id="loginEmail" class="form-group">
                                <label class="control-label" for="loginEmailInput">Email address</label>
                                <input type="email" class="form-control" id="loginEmailInput" placeholder="Enter email" required autofocus>
                            </div>
                            <div id="loginPassword" class="form-group">
                                <label class="control-label" for="loginPasswordInput">Password</label>
                                <input type="password" class="form-control" id="loginPasswordInput"
                                       placeholder="Password"
                                       required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="loginSubmit" type="submit" class="btn btn-default">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</span>

<!-- JavaScript files placed at the end of the document so the pages load faster
    ================================================== -->
<!-- Jquery core js files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Jquery Ui js -->

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

<!-- Bootstrat core js files -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Modernizr javascript -->
<script type="text/javascript" src="plugins/modernizr.js"></script>

<!-- Isotope javascript -->
<script type="text/javascript"
        src="plugins/isotope/isotope.pkgd.min.js"></script>


<!-- Backstretch javascript -->
<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

<!-- Appear javascript -->
<script type="text/javascript" src="plugins/jquery.appear.js"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="js/template.js"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>