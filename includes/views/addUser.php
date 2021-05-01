<?php
$title = 'ثبت نام';
$main = <<< EOT
			<h1>ثبت نام</h1>
			<form action = "" method = "post" name = "registerForm" >
				<label for = "firstname">نام و نام خانوادگی</label>
				<span class = "input-group">
					<input type = "text" name = "firstname" id = "firstname" placeholder = "نام" class="form-control" value = "">
					<input type = "text" name = "lastname" id = "lastname" placeholder = "نام خانوادگی" class="form-control" value = "">
				</span><br>
				
				<label for = "email">ایمیل</label>
				<input type = "email" name = "email" id = "email" class="form-control far fa-eye" required value = ""><br>
				
				<label for = "password">کلمه عبور</label>
				<span class="input-group">
					<input type = "password" name = "password" id = "password" class="form-control" required>
				</span><br>		
				
				<label for = "state">استان</label>			
				<input name = "state" id = "state" class="form-control" required>
				<br>
				<label for = "city">شهر</label>			
				<input name = "city" id = "city" class="form-control" required>
				<br>
				
				<input type = "submit" name = "submit" value = "ثبت نام" class= "btn btn-success">
				<a href = "login.php" class = "btn btn-link">وارد شوید</a>
			</form>
EOT;

include 'templates/master.php';