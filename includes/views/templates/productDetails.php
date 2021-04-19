<?php
echo "
			<h2>
				نام دوره: {$name}
			</h2>
			<img src = '{$imgSrc}' class = 'card-img-top'>
			<h3>مشخصات</h3>
			<p>
				<span class = 'font-weight-bold'>قیمت: </span>";
			echo number_format( $price ); 
			echo"			تومان<br>
				<span class = 'font-weight-bold'>توضیحات:</span>";
				if( ! empty( $description ) ) echo $description;
				else echo '---';
				echo "
			</p>
			<h3>زمان تشکیل</h3>
			<p>
				روزهای {$weekday}
				از {$timeFrom} تا {$timeTo}
			</p>
			<hr>
			<section class = 'row container'>
				<span class = 'col'>
						<a href = 'editProduct.php?id={$id}' class = 'btn btn-primary'>ویرایش</a>
						<a href = 'deleteProduct.php?id={$id}' class = 'btn btn-danger'>حذف</a>
				</span>
			</section>";
?>