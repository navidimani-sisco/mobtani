<?php
$title = 'ورود';
$main = '
			echo <<< EOT
			<h1>ورود</h1>
			<form action = "" method = "post" name = "loginForm" >
						
				<label for = "email">ایمیل</label>
				<input type = "email" name = "email" id = "email" class="form-control far fa-eye" required value = "
			EOT;
			if( isset($email) ) echo $email;
			echo <<< EOT
			"><br>
				
				<label for = "password">کلمه عبور</label>
				<span class="input-group">
					<input type = "password" name = "password" id = "password" class="form-control" required>
				</span><br>		
				
				<input type = "submit" name = "submit" value = "ورود" class= "btn btn-success">
				<a href = "addUser.php" class = "btn btn-link">ثبت نام کتید</a>
			</form>
			EOT;
';
include 'templates/master.php';