<?php

	if ( $user->is_logged_in() ) {
		$use->redirect( 'home.php' );
	}

	if ( isset( $_POST['login_button'] ) ) {
		$credential = $_POST['user_credential'];
		$pass       = $_POST['user_pass'];

		if ( $user->login( $credential, $pass ) ) {
			$user->redirect( 'home.php' );
		} else {
			$message = 'Wrong user or password, try again';
			unset( $_POST['login_button'] );
			unset ( $_POST['user_credential'] );
			unset ( $_POST['user_pass'] );
		}
	}
?>
