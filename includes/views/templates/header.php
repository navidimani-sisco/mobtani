
		<header class = 'container-fluid'>
			<section class = 'row'>
				<section class = 'col-2' id = "logo">
					<img src = '<?php assets('images/logo.png');?>' class = "img-fluid">
				</section>
				<section class = 'col align-self-center'>
					<h1>آکادمی راست راه</h1>
					<p>بهترین‌های آموزش کشور</p>
				</section>
			</section>
		</header>
		<nav class = 'navbar navbar-expand-lg navbar-light sticky-top'>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class = 'navbar-nav'>
					<li class = 'nav-item'><a class = 'nav-link' href = "<?php echo SITE_URL;?>index.php">خانه</a></li>
					<li class = 'nav-item'><a class = 'nav-link' href = "<?php echo SITE_URL;?>catalog.php">فروشگاه</a></li>
					<li class = 'nav-item'><a class = 'nav-link' href = "<?php echo SITE_URL;?>blog/blog.php">وبلاگ</a></li>
					<li class = 'nav-item'><a class = 'nav-link' href = "<?php echo SITE_URL;?>contact.html">تماس با ما</a></li>
				</ul>
			</div>
		</nav>