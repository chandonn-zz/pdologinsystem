<?php

/**
* 
*/
class User {

	private $db;
	
	function __construct( $connection )	{
		$this->db = $connection;
	}

	public function register( $first, $last, $name, $mail, $pass ) {
		try {
			$hashed = password_hash( $pass, PASSWORD_DEFAULT );

			$sentence = $this->db->prepare( 'INSERT INTO users( name, email, pass ) VALUES( :name, :email, :pass )' );

			$sentence->bindparam( ':name', $name );
			$sentence->bindparam( ':email', $mail );
			$sentence->bindparam( ':pass', $pass );
			$sentence->execute();

			return $sentence;
		} catch( PDOException $e ) {
			$e->getMessage();
		}
	}

	public function login( $name, $mail, $pass ) {
		try {
			$sentence = $this->db->prepare( 'SELECT FROM users WHERE name=:name OR mail:mail LIMIT 1' );

			$sentence->bindparam( ':name', $name );
			$sentence->bindparam( ':mail', $mail );
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
}