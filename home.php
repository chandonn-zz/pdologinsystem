<?php

	require_once 'database-connection.php';

	if ( false === $user->is_logged_in() ) {
		$user->redirect( 'index.php' );
	}

	if ( false !== $user->get_user_data( $_SESSION['user_session'] ) ) {
		$user_data = $user->get_user_data( $_SESSION['user_session'] );
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>PDO Login System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="jumbotron">
		<h1 class="display-3">Hello, <?php echo $user_data['name']; ?>!</h1>
		<p class="lead">PDO Login system with the only purpose of learning and practicing.</p>
		<hr class="my-4">
		<p>This account is registered under the e-mail: <?php echo $user_data['email']; ?>.</p>
		<p class="lead">
			<a class="btn btn-primary btn-lg" href="#" role="button">Logout</a>
		</p>
	</div>
</body>
</html>