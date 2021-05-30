<?php
if( ! defined('DBHOST') )
	define( 'DBHOST', 'localhost' );
if( ! defined('DBUSER') )
	define( 'DBUSER', 'root' );
if( ! defined('DBPASS') )
	define( 'DBPASS', '' );
if( ! defined('DBNAME') )
	define( 'DBNAME', 'mobtani' );
	
if( ! defined('CHARSET') )
	define( 'CHARSET', 'utf8mb4' );
if( ! defined('COLLATE') )
	define( 'COLLATE', 'utf8mb4_general_ci' );  // utf8mb4_persian_ci

$dbHost =	DBHOST;
$dbUser =	DBUSER;
$dbPass =	DBPASS;
$dbName =	DBNAME;

$charset =	CHARSET;
$collate =	COLLATE;

$softSetup = true;


if( ! defined('LOGIN_DEADLINE') )
	define( 'LOGIN_DEADLINE', 30 );  // days
if( ! defined('ACTIVITY_DEADLINE') )
	define( 'ACTIVITY_DEADLINE', 10 );  // minutes