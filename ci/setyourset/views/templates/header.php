<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Set Your Set!</title>
    <link rel="icon" href="<?php echo base_url().'assets/img/favicon.png';?>" type="image/gif">
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

                <a class="navbar-brand" href="<?php echo base_url();?>">Home</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>

                        <a href="<?= site_url('pages/view/about') ?>">About</a>
                    </li>
                    <li>
                        <a href="<?= site_url('pages/view/faq') ?>">FAQ</a>
                    </li>
                    <li>
                        <a href="<?= site_url('DMGCalculator/itemset') ?>">DMG Calculator</a>
                    </li>
                    <?php
                    if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
                        ?>
                        <li>
                            <a href="#myModal" data-toggle="modal"> Sign-in</a>
                            <!--<a href="<?php echo base_url().'user/login/';?>"> Sign-in</a>-->
                        </li>
                        <li>
                            <a href="<?= site_url('user/register') ?>">Register</a>

                        </li>
                        <?php 
                    } else {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?=$_SESSION['Username']?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
									<li>
										<a href="#">My Item sets</a>
									</li>
									<li>
										<a href="<?= site_url('user/settings') ?>">Settings</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="<?= site_url('user/logout') ?>">Sign-out</a>
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


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="logForm" id="form" novalidate>
              <div class="modal-header" id="modal_header">
				<h4 class="modal-title" id="myModalLabel">Input your username and password</h4>
              </div>
              <div class="modal-body" id="modal_body">
                <a> Username: </a>
                <br>
                <input type="text" class="form-control" id="username" name="username">
                <br>
                <a> Password: </a>
                <br>
                <input type="password" class="form-control" id="password" name="password">
                <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" value="login" id="login">Sign-in</button>
              </div>
            </form>
        </div>
      </div>
    </div>