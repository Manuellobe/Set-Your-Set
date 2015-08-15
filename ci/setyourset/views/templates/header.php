<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Set Your Set!</title>
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/modern-business.css';?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() . 'assets/css/mycss.css';?>" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() . 'index.php/welcome/index';?>">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="faq.php">FAQ</a>
                    </li>
                    <li>
                        <a href="dmgcalc.php">DMG Calculator</a>
                    </li>
                    <?php
                    if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
                        ?>
                        <li>
                            <a href="#">Sign-in</a>
                        </li>
                        <li>
                            <a href="dmgcalc.php">Register</a>
                        </li>
                        <?php 
                    } else {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?=$user?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                            <li>
                                <a href="#">My Item sets</a>
                            </li>
                            <li>
                                <a href="userSettings.html">Settings</a>
                            </li>
                            <li>
                                <a href="#">Sign-out</a>
                            </li>
                            </ul>
                        </li>                            
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>