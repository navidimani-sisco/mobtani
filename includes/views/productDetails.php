<?php
$title = 'جزییات محصول';
$main = '
			if( isset($alerts) )
				echo $alerts;
			get_template_part("productDetails", null, $row);
';

include 'templates/master.php';