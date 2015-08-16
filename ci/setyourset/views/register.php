
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
                <form name="register" id="regForm" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Name (this will be your login user):</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password:</label>
                            <input type="password" class="form-control" id="pass" required data-validation-required-message="Please enter your password.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Confirm password:</label>
                            <input type="password" class="form-control" id="passAgain" required data-validation-required-message="Please confirm your password.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email address:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Confirm email address:</label>
                            <input type="email" class="form-control" id="emailAgain" required data-validation-required-message="Please confirm your email address.">
                        </div>
                    </div>
                    <p> Clicking the register button means that you accept our terms </p>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

        <hr>
