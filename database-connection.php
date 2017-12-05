<?php

session_start();

$host = 'localhost';
$user = 'root';
$pass = '1234';
$db_name = 'loginsystem';

try {
	$connection = new PDO( 'mysql:host=localhost;dbname=loginsystem', $user, $pass );
	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch( PDOException $e ) {
	echo $e->getMessage();
}

include_once 'class.user.php';
$user = new User( $connection );

?>
