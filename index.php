<?php

require_once 'database-connection.php';

require_once 'login-settings.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>PDO Login System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container-fluid">
		<div class="form-group col-md-6">
			<form method="post">
				<h3>Sign in to your account</h3>
				<fieldset>
					<label for="">Name or E-mail</label>
					<input type="text" class="form-control" name="user_credential">
				</fieldset>
				<fieldset>
					<label for="">Password</label>
					<input type="password" class="form-control" name="user_pass">	
				</fieldset>
				<button type="submit" class="btn btn-primary login-btn" name="login_button">Login</button>
			</form>
			<?php if( isset( $message ) ) : ?>
				<div class="alert alert-danger message-holder" role="alert">
					<?php
						echo $message;
					?>
				</div>
			<?php endif; ?>
			<label for="">Don't have account? <a href="register.php">Make one now!</a></label>
		</div>
	</div>
</body>
</html>