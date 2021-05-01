<!doctype html>
<html lang = "fa" class = "container-fluid">
	<head>
		<title>آکادمی | 
		<?php if( isset($title) )	echo $title; ?>
		</title>
		<?php get_template_part('head'); ?>		
	</head>
	<body class = "row gx-10 gy-2">
		<?php get_header(); ?>
		<main class = "container col-12 col-lg-8">
			<?php
				//main();
				if( isset($alerts) )
					echo $alerts;
				
				if( isset($main) )
					eval( $main );
			?>
		</main>
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>
		<?php get_template_part('scripts'); ?>		
	</body>
</html>