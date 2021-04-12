<!doctype html>
<html lang = "fa">
	<head>
		<title>آکادمی | ویرایش کاربر</title>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">
		
		<link href = "assets/css/style.css" rel = "stylesheet">
		<style>
		</style>
	</head>
	<body class = "container">
		<header></header>
		<main class = "container">
			<?php
				if( isset($alerts) )
					echo $alerts;
			?>
			<h1>ویرایش کاربر</h1>
			<form action = "" method = "post" name = "registerForm" >
				<label for = "firstname">نام و نام خانوادگی</label>
				<span class = "input-group">
					<input type = "text" name = "firstname" id = "firstname" placeholder = "نام" class="form-control" value = "<?php if( isset($row['firstname']) ) echo $row['firstname']; ?>">
					<input type = "text" name = "lastname" id = "lastname" placeholder = "نام خانوادگی" class="form-control" value = "<?php if( isset($row['lastname']) ) echo $row['lastname']; ?>">
				</span><br>
				
				<label for = "email">ایمیل</label>
				<input type = "email" name = "email" id = "email" class="form-control" required value = "<?php if( isset($row['email']) ) echo $row['email']; ?>"><br>
				
				<label for = "password">کلمه عبور</label>
				<span class="input-group">
					<input type = "password" name = "password" id = "password" class="form-control">
				</span><br>		
				
				<label for = "state">استان</label>			
				<input name = "state" id = "state" class="form-control" required value = "<?php if( isset($row['state']) ) echo $row['state']; ?>">
				<br>
				<label for = "city">شهر</label>			
				<input name = "city" id = "city" class="form-control" required value = "<?php if( isset($row['city']) ) echo $row['city']; ?>">
				<br>
				
				<input type = "submit" name = "submit" value = "ویرایش" class= "btn btn-success">
			</form>
		</main>
		<aside></aside>
		<footer></footer>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	</body>
</html>