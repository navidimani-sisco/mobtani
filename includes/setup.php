<?php
require '__php__.php';

$db = new DB( false );
if( ! $softSetup ) {
	$sql = "DROP DATABASE IF EXISTS {$dbName}";
	$db->execute($sql);
	Alert::alerts("دیتابیس {$dbName} و جداول آن حذف شد", 'success');
} // در غیر اینصورت دیتابیس فعلی را حفظ کن و جداول جدید را بیافزا

$sql = "CREATE DATABASE IF NOT EXISTS {$dbName}
		CHARSET {$charset}
		COLLATE {$collate}";
$result = $db -> execute( $sql );
if( $result )
	Alert::alerts('دیتابیس {$dbName} با موفقیت ایجاد شد', 'success');

unset( $db );
$db = new DB(); // همراه با انتخاب دیتابیس

$sql = "CREATE TABLE IF NOT EXISTS Message(
		id INT AUTO_INCREMENT NOT NULL,
		email VARCHAR(255),
		title VARCHAR(255),
		body TEXT,
		status VARCHAR(20),
		PRIMARY KEY(id)
		)ENGINE = INNODB";
$result = $db -> execute( $sql );
if( $result )
	Alert::alerts('جدول پیام با موفقیت ایجاد شد', 'success');

$sql = "CREATE TABLE IF NOT EXISTS Product(
		id INT AUTO_INCREMENT NOT NULL,
		name VARCHAR(30),
		price INT,
		weekday VARCHAR(30),
		timeFrom VARCHAR(30),
		timeTo VARCHAR(30),
		imgSrc VARCHAR(255),
		description TEXT,
		status VARCHAR(20),
		PRIMARY KEY(id)
		)ENGINE = INNODB";
$result = $db -> execute( $sql );
if( $result )
	Alert::alerts('جدول محصول با موفقیت ایجاد شد', 'success');


$sql = "CREATE TABLE IF NOT EXISTS User( 
		id INT AUTO_INCREMENT NOT NULL,
		firstname VARCHAR(50),
		lastname VARCHAR(50),
		email VARCHAR(50),
		passwordHash VARCHAR(255),
		state VARCHAR(50),
		city VARCHAR(50),
		Roleid INT,
		imgSrc VARCHAR(255),
		status VARCHAR(20),
		PRIMARY KEY(id)
		)ENGINE = INNODB";
$result = $db -> execute( $sql );
if( $result )
	Alert::alerts('جدول کاربر با موفقیت ایجاد شد', 'success');

if( ! $softSetup ) {	
	$parameters = array(
		'firstname'		=> 'admin',
		'lastname'		=> 'admin',
		'email'			=> 'admin@example.com',
		'passwordHash'	=> password_hash('123', PASSWORD_DEFAULT),
		'imgSrc'		=> assets('images/male-profile.jpg'),
		'roleid'		=> 1
	);
	User :: add( $parameters );
}		
	
$sql = "CREATE TABLE IF NOT EXISTS Role( 
		id INT AUTO_INCREMENT NOT NULL,
		role VARCHAR(15),
		ProductAdd BOOLEAN DEFAULT 0,
		ProductEdit BOOLEAN DEFAULT 0,
		ProductDelete BOOLEAN DEFAULT 0,
		ProductDetails BOOLEAN DEFAULT 0,
		ProductEditOther BOOLEAN DEFAULT 0,
		ProductDeleteOther BOOLEAN DEFAULT 0,
		ProductDetailsOther BOOLEAN DEFAULT 0,
		UserAdd BOOLEAN DEFAULT 0,
		UserEdit BOOLEAN DEFAULT 0,
		UserDelete BOOLEAN DEFAULT 0,
		UserDetails BOOLEAN DEFAULT 0,
		UserEditOther BOOLEAN DEFAULT 0,
		UserDeleteOther BOOLEAN DEFAULT 0,
		UserDetailsOther BOOLEAN DEFAULT 0,
		status VARCHAR(20),
		PRIMARY KEY(id)
		)ENGINE = INNODB";
$result = $db -> execute( $sql );
if( $result )
	Alert::alerts('جدول نقش با موفقیت ایجاد شد', 'success');

if( ! $softSetup ) {	
	$parameters = array(
		'id'			=> 1,
		'role'			=> 'superAdmin',
		'ProductAdd'	=> TRUE,
		'ProductEdit'	=> 1,
		'UserAdd'		=> 1,
		'UserEdit'		=> 1
	);
	Role :: add( $parameters );
	$parameters = array(
		'id'			=> 2,
		'role'			=> 'normal',
		'ProductAdd'	=> TRUE,
		'ProductEdit'	=> 1,
		'UserAdd'		=> 1,
		'UserEdit'		=> 1,
		'UserEditOther' => 0
	);
	Role :: add( $parameters );
}
$alerts = Alert::alerts();
?>
<!doctype html>
<html lang = "fa">
	<head>
		<title>آکادمی | ستاپ</title>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">

		<link href = "../public/assets/css/style.css" rel = "stylesheet">
		<style>
		</style>
	</head>
	<body class = "container">
		<header></header>
		<main>
			<?php
				if( isset($alerts) )
					echo $alerts;
			?>
		</main>
		<aside></aside>
		<footer></footer>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	</body>
</html>