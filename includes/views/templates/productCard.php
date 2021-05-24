	<section class = 'col'>
		<article class = 'card h-100'>
			<img src = '<?php echo $imgSrc; ?>' class = 'card-img-top'>
			<section class = 'card-body'>
				<h4 class = 'card-title'>
					<a href = 'productDetails.php?id=<?php echo $id; ?>' class = 'card-link'>
						نام دوره: <?php echo $name; ?>
					</a>
				</h4>
				<section class = 'card-text'>
					<p>
						<span class = 'fw-bold'>قیمت:</span>
						<?php echo number_format( $price ); ?>  تومان<br>
						<span class = 'fw-bold'>توضیحات:</span>
						<?php echo  $description; ?>
					</p>
					<h5>زمان تشکیل</h5>
					<p>
						روزهای <?php echo $weekday; ?> 
						از <?php echo $timeFrom; ?> تا <?php echo $timeTo; ?>
					</p>
				</section>
			</section>
			<footer class = 'card-footer'>
				<section class = "row justify-content-between">
					<span class = 'col'>
						<a href = 'editProduct.php?id=<?php echo $id;?>' class = 'btn btn-primary'>ویرایش</a>
						<a href = 'deleteProduct.php?id=<?php echo $id;?>' class = 'btn btn-danger'>حذف</a>
					</span>
					<span class = 'col text-end'>
						<a href = 'likeProduct.php?id=<?php echo $id;?>' class = 'btn fa-lg fas fa-heart' target = '_blank'></a>
						<a href = 'saveProduct.php?id=<?php echo $id;?>' class = 'btn fa-lg far fa-bookmark' target = '_blank'></a>					
					</span>
				<section>
			</footer>
		</article>
	</section>