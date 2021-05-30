<?php
$title = 'جزییات محصول';
$main = '
		echo <<< EOT
			<h2>نام دوره: {$name}</h2>
			<img src = "{$imgSrc}" class = "card-img-top">
			<h3>مشخصات</h3>
			<p>
				<span class = "font-weight-bold">قیمت: </span>
EOT;
			echo number_format( $price ); 
			echo <<< EOT
				تومان<br>
				<span class = "font-weight-bold">توضیحات:</span>
EOT;
				if( ! empty( $description ) ) echo $description;
				else echo "---";
			echo <<< EOT
			</p>
			<h3>زمان تشکیل</h3>
			<p>
				روزهای {$weekday}
				از {$timeFrom} تا {$timeTo}
			</p>
			<hr>
			<section class = "row container">
				<span class = "col">
						<a href = "editProduct.php?id={$id}" class = "btn btn-primary">ویرایش</a>
						<a href = "deleteProduct.php?id={$id}" class = "btn btn-danger">حذف</a>
				</span>
				<span class = "col text-end align-self-center">
EOT;
			get_template_part("rate");
			echo "
				</span>
			</section>
			";
'; // end main

include 'templates/master.php';