<?php

	if ( $user->is_logged_in() ) {
		$user->redirect( 'home.php' );
	}

	if ( isset( $_POST['register_button'] ) ) {
		$name = trim( $_POST['new_name'] );
		$mail = trim( $_POST['new_mail'] );
		$pass = trim( $_POST['new_pass'] );

		if ( '' === $name ) {
			$message = 'Please, type a user name';
		} else if ( '' === $mail || ! filter_var( $mail, FILTER_VALIDADE_EMAIL ) ) {
			$message = 'Provide a valid email';
		} else if ( '' === $pass || 6 > strlen( $pass ) ) {
			$message = 'Your password must have at least 6 characters';
		} else {
			try {
				$sentence = $connection->prepare( 'SELECT name, email FROM users WHERE name=:name OR email=:email' );

				$sentence->bindParam( ':name', $name );
				$sentence->bindParam( ':email', $mail );

				$sentence->execute();

				$matched_user = $sentence->fetch( PDO::FETCH_ASSOC );

				if ( $matched_user['name'] === $name ) {
					$warning[] = 'User taken, please choose other';
				} else if ( $matched_user['email'] === $mail ) {
					$warning[] = 'Email already registered, want to login?';
				} else {
					if ( $user->register( $name, $mail, $pass ) ) {
						$user->redirect( 'register.php?joined' );
					}
				}
			} catch ( PDOException $e ) {
				$e->get_Message();
			}
		}
	}

?>