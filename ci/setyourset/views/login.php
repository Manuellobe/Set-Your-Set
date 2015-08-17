<div class="container well" id="sha">
    <?php echo validation_errors(); ?>
    <?php echo form_open('user/login'); ?>
	<form class="login" >
		<div class="form-group">
		<?php
			if(isset($errormsg))
			{
				if(array_key_exists('success', $errormsg))
				{
					echo '<div class="alert alert-success" role="alert">';
					echo 'User verified successfully';
					echo '</div>';
				} 
				else if(array_key_exists('error', $errormsg))
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo 'The user couldn\'t be verified';
					echo '</div>';
				}
				else if(array_key_exists('pendingVerification', $errormsg))
				{
					echo '<div class="alert alert-info" role="alert">';
					echo 'Check your email inbox';
					echo '</div>';
				}
			}
		?>
		<input type="text" class="form-control" placeholder="Username" id="username" name="username" required autofocus/>
		</div>
		<div class="form-group">
		<input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" required>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Log in</button>
	    <!--<<div class="checkbox">
			<label class="checkbox">
				<input type="checkbox" value="1" name="remember"> Remember me
			</label>
			p class="help-block"><a href="#">Forgot password?</a> | New to the Club? <a href="newuser">Sign up now</a> </p>
				
		</div>-->
	</form>
</div>