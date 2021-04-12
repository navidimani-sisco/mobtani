	<section class = 'col'>
		<article class = 'card h-100'>
			<img src = '<?php echo $args['imgSrc']; ?>' class = 'card-img-top'>
			<section class = 'card-body'>
				<h4 class = 'card-title'>
					<a href = 'productDetails.php?id=<?php echo $args['id']; ?>' class = 'card-link'>
						نام دوره: <?php echo $args['name']; ?>
					</a>
				</h4>
				<section class = 'card-text'>
					<p>
						<span class = 'fw-bold'>قیمت:</span>
						<?php echo number_format( $args['price'] ); ?>  تومان<br>
						<span class = 'fw-bold'>توضیحات:</span>
						<?php echo  $args['description']; ?>
					</p>
					<h5>زمان تشکیل</h5>
					<p>
						روزهای <?php echo $args['weekday']; ?> 
						از <?php echo $args['timeFrom']; ?> تا <?php echo $args['timeTo']; ?>
					</p>
				</section>
			</section>
			<footer class = 'card-footer'>
				<span class = 'col'>
					<a href = 'editProduct.php?id=<?php echo $args['id'];?>' class = 'btn btn-primary'>ویرایش</a>
					<a href = 'deleteProduct.php?id=<?php echo $args['id'];?>' class = 'btn btn-danger'>حذف</a>
				</span>
			</footer>
		</article>
	</section>