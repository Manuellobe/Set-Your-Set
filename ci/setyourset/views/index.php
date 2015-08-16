<body>
    
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('<?php echo base_url() . 'assets/img/slide/yasuo.jpg';?>')"></div>
                <div class="carousel-caption">
                    <h2>Submit your item sets</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo base_url() . 'assets/img/slide/riven.jpg';?>')"></div>
                <div class="carousel-caption">
                    <h2>See other people's item sets</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo base_url() . 'assets/img/slide/aatrox.jpg';?>')"></div>
                <div class="carousel-caption">
                    <h2>Download any item set!</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Set-Your-Set!
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Submit your item sets</h4>
                    </div>
                    <div class="panel-body">
                        <p>Create a new user or log in with an existing one and submit your favourites item sets, so other people can see it. Set your set is an easy way to create and share item sets and its free!</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-thumbs-o-up"></i> See other people's item sets</h4>
                    </div>
                    <div class="panel-body">
                        <p>Search for item sets made by other users, and compare them with yours. If you want to know how to build a champ, this is your site!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Easy to Use!</h4>
                    </div>
                    <div class="panel-body">
                        <p>Do you like any item set from this site?, dont worry! You can download it directly or copy the source code</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->


        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">New! Dmg calculator</h2>
            </div>
            <div class="col-md-6">
                <p>Our website can calculate the damage that you can deal (excluding armor/magic resitance) based in your champion, item set, active rune page and active mastery page.</p>
                <ul>
                    <li><strong>Auto-Attacks and spells damage!</strong>
                    </li>
                    <li>Select a champ</li>
                    <li>Select a mastery page</li>
                    <li>Select a rune page</li>
                    <li>Select a item set</li>
                    <li>Calculate the damage!</li>
                </ul>
                <p>The values are generated instantly.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>You can access to this feature just clicking in this button, don't forget to be logged in</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="<?php echo base_url() . 'index.php/functions/dmgcalc';?>">Dmg Calculator</a>
                </div>
            </div>
        </div>

        <hr>

         <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Item sets example</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" src="<?php echo base_url() . 'assets/img/example/example1.png';?>" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" src="<?php echo base_url() . 'assets/img/example/example2.png';?>" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" src="<?php echo base_url() . 'assets/img/example/example3.png';?>" alt="">
            </div>
        </div>
        <!-- /.row -->
        <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
        </script>