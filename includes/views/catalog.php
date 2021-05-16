<?php
$title = 'کاتالوگ';
$main = '
			echo "<section class = \"row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4\">";
				foreach($table as $row){
					get_template_part("productCard", null, $row);
				}
			echo "</section>";
';
include 'templates/master.php';