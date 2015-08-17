
<body background="<?php echo base_url() . 'assets/img/lux.jpg';?>">

    <!-- Page Content -->
    <div class="container  registerForm">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Register</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Welcome to SetYourSet!</h3>
                <p>
                    In order to use our features you must be part of our community. To join us, just fill the following form :)
                </p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <form method="POST" name="register" id="regForm" novalidate>

                    <?php
                        if(isset($alreadyRegistered))
                        {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo $alreadyRegistered;
                            echo '</div>';
                        }
                    ?>

                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="password" class="form-control" placeholder="Repeat password" id="rpassword" name="rpassword" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="email" class="form-control" placeholder="e-mail" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="email" class="form-control" placeholder="Repeat e-mail" id="remail" name="remail" required>
                        </div>
                    </div>
                    <input type="checkbox" value="1" name="conditions" required>I accept the web conditions.</br>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

        <hr>
