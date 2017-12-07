<?php

/**
 * Main class for the system.
 */
class User {

	private $db;
	
	function __construct( $connection )	{
		$this->db = $connection;
	}

	public function register( $name, $mail, $pass ) {
		try {
			$hashed_password = password_hash( $pass, PASSWORD_DEFAULT );

			$sentence = $this->db->prepare( 'INSERT INTO users( name, email, pass ) VALUES( :name, :email, :pass )' );

			$sentence->bindParam( ':name', $name, PDO::PARAM_STR );
			$sentence->bindParam( ':email', $mail, PDO::PARAM_STR );
			$sentence->bindParam( ':pass', $hashed_password );
			$sentence->execute();

			return $sentence;
		} catch( PDOException $e ) {
			$e->getMessage();
		}
	}

	public function login( $credential, $pass ) {
		try {
			$sentence = $this->db->prepare( 'SELECT * FROM users WHERE name=:name OR email=:mail LIMIT 1' );

			$sentence->bindParam( ':name', $credential, PDO::PARAM_STR );
			$sentence->bindParam( ':mail', $credential, PDO::PARAM_STR );
			$sentence->execute();

			$matched_row = $sentence->fetch( PDO::FETCH_ASSOC );

			if ( $sentence->rowCount() > 0 ) {
				if ( password_verify( $pass, $matched_row['pass'] ) ) {
					$_SESSION[ 'user_session' ] = $matched_row['id'];
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} catch( PDOException $e ) {
			$e->getMessage();
		}
	}

	public function is_logged_in() {
		if ( isset( $_SESSION['user_session'] ) ) {
			return true;
		}

		return false;
	}

	public function redirect( $url ) {
		header( 'Location: ' . $url );
		exit;
	}

	public function logout() {
		session_destroy();
		unset( $_SESSION['user_session'] );
		return true;
	}
}
?>
