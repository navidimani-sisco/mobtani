<?php
$title ='ویرایش کاربر';
$main = '
		echo <<< EOT
			<h1>ویرایش کاربر</h1>
			<form action = "" method = "post" name = "registerForm" >
				<label for = "firstname">نام و نام خانوادگی</label>
				<span class = "input-group">
					<input type = "text" name = "firstname" id = "firstname" placeholder = "نام" class="form-control" value = "{$firstname}">
					<input type = "text" name = "lastname" id = "lastname" placeholder = "نام خانوادگی" class="form-control" value = "{$lastname}">
				</span><br>
				
				<label for = "email">ایمیل</label>
				<input type = "email" name = "email" id = "email" class="form-control" required value = "{$email}"><br>
				
				<label for = "password">کلمه عبور</label>
				<span class="input-group">
					<input type = "password" name = "password" id = "password" class="form-control">
				</span><br>		
				
				<label for = "state">استان</label>			
				<input name = "state" id = "state" class="form-control" required value = "{$state}">
				<br>
				<label for = "city">شهر</label>			
				<input name = "city" id = "city" class="form-control" required value = "{$city}">
				<br>
				
				<input type = "submit" name = "submit" value = "ویرایش" class= "btn btn-success">
			</form>
EOT;
';

include 'templates/panel/master.php';