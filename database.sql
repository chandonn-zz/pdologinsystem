CREATE DATABASE 'loginsystem';
CREATE TABLE 'loginsystem'.'users' (
	'id' INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	'name' VARCHAR( 50 ) NOT NULL,
	'email' VARCHAR( 255 ) NOT NULL,
	'pass' VARCHAR( 60 ) NOT NULL,
	UNIQUE( 'name' ),
	UNIQUE( 'email' )
) ENGINE = MYISAM;