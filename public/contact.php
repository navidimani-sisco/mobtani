<?php
/*
var_dump( $_POST );
var_dump( $_GET );
var_dump( $_REQUEST );
*/

// A. validation
// B. Insert in DB

// 1. connect to DB - mysql - mysqli - PDO
include 'settings.php';
$dbc = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME); // mysqli_connect
// 2. create insert query
//$sql = "INSERT INTO message(title, body)
//		VALUES('my title', 'متن پیام')";
$sql = "INSERT INTO message(title, body)
		VALUES('{$_POST['title']}', '{$_POST['body']}')";
//echo $sql . '<br>';
// 3. execute query
$result = $dbc -> query( $sql ); // mysqli_query
// 4. close connection
$dbc -> close(); //mysqli_close

// C. success message
//اگر با موفقیت درج شد
include 'functions.php';
$alert = alertTemplate('با موفقیت ثبت شد!', 'error');
?>
<!doctype html>
<html lang = "fa"><!-- dir = "rtl" -->
	<head>
		<title>آکادمی | تماس با ما</title>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">
		
		<link href = "style.css" rel = "stylesheet">
		<style>
		</style>
	</head>
	<body class = "container">
		<header></header>
		<main>
			<?php
				if( isset($alert) )
					echo $alert;
			?>
		</main>
		<aside></aside>
		<footer></footer>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	</body>
</html>