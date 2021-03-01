<?php
	var_dump( $_POST );
?>
<!doctype html>
<html lang = "fa">
	<head>
		<meta charset = "utf-8">
		<title>افزودن محصول</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "/mobtani/public/assets/css/main.css">
	</head>
	<body class = "container">
		<h1>تماس با ما</h1>
		<?php //if( isset( $alert ) ) echo $alert;?>
		<form action = "" method = "post">
		
			<label for = "email">آدرس ایمیل: </label>
			<input type = "email" name = "email" id = "email" class="form-control" value = "navidimani.sisco@gmail.com" readonly><br>	
			
			<section>
			<input type = "radio" name = "gender" value = "male" id = "male" checked class="form-check-input"><label for = "male"  >مرد</label>
			</section>
			<section>
			<input type = "radio" name = "gender" value = "female" id = "female" class="form-check-input"><label for = "female"  >زن</label>
			</section>
			
			<select name = "gender2" class="form-control">
				<option value = "male">مرد</option>
				<option value = "female" selected>زن</option>
				<option value = "other">دیگر</option>
			</select>
			<br>
			
			<select name = "gender2[]" multiple class="form-control">
				<option value = "male">مرد</option>
				<option value = "female" selected>زن</option>
				<option value = "other">دیگر</option>
			</select>
			<br>
			<input type = "checkbox" name = "spices[]" value = "salt" id = "salt" disabled checked class="form-check-input"><label for = "salt">نمک</label> <br> 
			<input type = "checkbox" name = "spices[]" value = "pepper" id = "pepper" class="form-check-input"><label for = "pepper">فلفل</label> <br> 
			<input type = "checkbox" name = "spices[]" value = "thyme" id = "thyme" checked class="form-check-input"><label for = "thyme">آویشن</label> <br> 
			
			<input type = "search" list = "genderList" name = "gender3" class="form-control">
			<datalist id = "genderList">
				<option value = "male">مرد</option>
				<option value = "female" selected>زن</option>
				<option value = "other">دیگر</option>
			</datalist>
			<br>
			
			<select name = "cities" class="form-control">
				<optgroup label = "اصفهان">
				<option value = "male">اصفهان</option>
				<option value = "female">خمینی شهر</option>
				</optgroup>
				<optgroup label = "فارس">
				<option value = "other">شیراز</option>
				<option value = "other">آباده</option>
				</optgroup>
			</select>
			<br>
			
			<input type = "submit" name = "submit" value = "ارسال" class="btn btn-primary">
		</form>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
	</body>
</html>