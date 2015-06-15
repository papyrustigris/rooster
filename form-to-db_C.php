<?php

require('connect.php');

$fullname = $_POST['full_name_C'];
$channelURL = $_POST['channel_URL_C'];
$email = $_POST['email_C'];
$time = time();

$sql = "INSERT INTO creators VALUES('', '$fullname', '$channelURL', '$email', '$time')";

if (!mysql_query($sql)) {
  die('error inserting into db: ' . mysql_error());
}

mysql_close();

if(!isset($_POST['submit']))
{
  //This page should not be accessed directly. Need to submit the form.
  echo "error; you need to submit the form!";
}
$fullname = $_POST['full_name_C'];
$channelURL = $_POST['channel_URL_C'];
$email = $_POST['email_C'];

//Validate first
if(empty($fullname)|| empty($channelURL) || empty($email)) 
{
    echo "All fields are mandatory!";
    exit;
}

$email_to = $email;
$email_from = 'automatedtest@roostr.tv';//<== update the email address
$email_subject = "Creator";
$email_body = "You have received a new message from the user $fullname.\n Here is the message:\n $channelURL \n".
    
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $channelURL \r\n";
//Send the email!
mail($email_to,$email_subject,$email_body,$headers);

header( "refresh:3;url=index.html" );

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Roostr | Performance Influencer Marketing - Drive direct mobile game installs with youtube and twitch">
    <meta name="author" content="">

    <title>Roostr</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/app.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/one-page-wonder.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>
    
    body {
        /*background-color:rgba(232, 69, 85, 0.7);
        background-size:cover;*/
        font-family: 'Open Sans';
        text-align: center;    
    }

    .top-section {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        overflow:hidden;
        z-index: -1;
    }

        #bgVideo { 
            position: absolute;
            top: 0;
            left: 0;
            border: 0;
            width: 100%;
            height: 100%;
        }

            @media (min-aspect-ratio: 16/9) {
              #bgVideo {
                top: -100%;
                height: 300%;
              }
            }
             
            @media (max-aspect-ratio: 16/9) {
              #bgVideo {
                width: 300%;
                left: -100%;
              }
            }

    #navbar {
        min-height: 75px;
    }

    .navbar-right {
        padding: 15px 5px;
    }


    .btn-jumbotron {
        background: none;
        border: 2px solid white;
        border-radius: 24px;
        font-size: 20px;
        margin:15px 15px;
        padding: 10px 40px;
        color: white;
    }


    .btn-jumbotron:hover {
        background-color: #34495E;
        color:white;
    }

    .modal-content {
        background: url('/images/sign_up_box.png');
        background-size: cover;
        text-align: center;
    }

        #form-wrapper {
            background: url('/images/sign_up_white_box.png');
            background-size: cover;
        }

        .form-group {
            margin:0;
        }

        .form-control {
            border: none;
            height: 50px;
        }

        .form-submit-btn {
            background-color: white;
            margin: 5px 15px;
        }

    footer {
        position: fixed;
        bottom: 10px;
        text-align: center;
        left: 20%;
        right: 20%;
    }

@media screen and (max-width: 480px) {
    body {
        overflow: hidden;
    }
    .jumbotron {
        position: relative;
        bottom:100px;
    }
}

</style>
    
<body>

<div class="overlay" style="background: url('images/Red_Overlay.png');
                              background-size: 100%;
                              position: absolute;
                              height: 100%;
                              width: 100%;">

    <div class="top-section">
        <video id="bgVideo" autoplay loop>
            <source src="images/vid-bkgrnd.mp4" type="video/mp4"/>
        </video>
    </div>
    
    <!-- Navigation -->

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img src="images/roostr_logo_nav.png" alt="" class="img-responsive" style="max-width:180px;" />
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">GAMES</a></li>
            <li><a href="#">CREATORS</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">JOIN</span></a>
              <ul class="dropdown-menu"><br>
                <li><a href="#">Video Creator</a></li>
                <li><a href="#">Game Maker</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <!-- Modal -->
      <div class="modal fade" id="ThankYou" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">

            <div class="modal-header">
                <img src="/images/roostr_logo_white.png" alt="" />
            </div>

            <div class="modal-body">
              <h2 style="color:white">Thank you for signing up!</h2>
                   <br>
              <h3 style="color:white">An email will arrive in your inbox shortly.</h3>
            </div>

            <div class="modal-footer" style="padding:40px;">
            </div>

          </div> <!-- end Modal content -->
          
        </div>
      </div> <!-- End Modal -->
      
    </div>           

    <!-- Full Width Image Header -->
        <div class="container">
            <div class="jumbotron" style="background:none; color: white;">
                <h1>Drive direct installs to your mobile games<br>
                through <span style="border-bottom:5px solid #FF332F">YouTube</span> & <span style="border-bottom:5px solid #8E62D7">Twitch</span> Influencer videos.</h1>
                <span>
                    <a href="/games.html" class="btn btn-jumbotron">
                        I HAVE A GAME
                    </a>
                    <a href="/creators.html" class="btn btn-jumbotron">
                        I MAKE VIDEOS
                    </a>
                </span>
                <footer>
                    <p style="font-size:16px">Copyright &copy; 2015 Roostr Inc. - All Rights Reserved</p>
                </footer>
            </div>
        </div>

</div>


        <!-- Footer -->


    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>

        var url = window.location;
        // Will only work if string in href matches with location
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

        // Will also work for relative and absolute hrefs
        $('ul.nav a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

    </script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-64033540-1', 'auto');
      ga('send', 'pageview');

    </script>

    <script>

        $( document ).ready(function () {
            $('#ThankYou').modal({
              show: 'true',
              backdrop: 'static'
            });
        });

        $('form').validator().on('submit', function (e) {
          if (e.isDefaultPrevented()) {
            // handle the invalid form...
          } else {
            //continue bout yo bizness
          }
        });

    </script>
</body>

</html>
