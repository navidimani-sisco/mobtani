<?php
	include '__php__.php';
	
	
	Authentication :: logout();
			
	Alert::alerts('از اینکه از خدمات ما استفاده میکنید ممنونیم!', 'warning');
	redirect('login.php');