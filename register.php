<?php

	require_once 'database-connection.php';

	require_once 'register-settings.php';

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
				<h3>Register here!</h3>
				<fieldset>
					<label for="">Name</label>
					<input type="text" class="form-control" name="new_name">
				</fieldset>
				<fieldset>
					<label for="">E-mail</label>
					<input type="text" class="form-control" name="new_mail">
				</fieldset>
				<fieldset>
					<label for="">Password</label>
					<input type="password" class="form-control" name="new_pass">	
				</fieldset>
				<button type="submit" class="btn btn-primary login-btn" name="register_button">Create account</button>
			</form>
			<?php if ( isset( $message ) ) : ?>
				<div class="alert alert-danger message-holder" role="alert">
					<?php
						echo $message;
						unset( $message );
					?>
				</div>
			<?php elseif ( isset( $warning ) ) : ?>
				<div class="alert alert-warning message-holder" role="alert">
					<?php
						echo $warning;
						unset( $warning );
					?>
				</div>
			<?php elseif ( isset( $_GET['joined'] ) ) : ?>
				<div class="alert alert-primary message-holder" role="alert">
					<span>Login successfull! <a href="index.php">Enter here</a></span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>