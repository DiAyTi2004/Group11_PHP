<?php
function insertPercentage($inputString)
{
	$characters = preg_split('//u', $inputString, -1, PREG_SPLIT_NO_EMPTY);
	$resultString = implode('%', $characters);

	return $resultString;
}

$searchSql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
	AND tbl_sanpham.tensanpham LIKE '%" . insertPercentage($keyword) . "%'";

$searchData = mysqli_query($connect, $searchSql);

$productImageSQL = "SELECT * FROM tbl_product INNER JOIN tbl_product_image ON tbl_product.id = tbl_product_image.product_id
WHERE tbl_product_image.main_image = 1 LIMIT 4";
$productImageData = mysqli_query($connect, $productImageSQL);

?>

<h3>Từ khoá tìm kiếm : <?php echo $_POST['keyword']; ?></h3>


<div class="container p-0">
	<div class="row">
		<div class="col-sm-12 col-md-2">
			<div class="appCard">
				1 of 2
			</div>
		</div>

		<div class="col-sm-12 col-md-10">
			<div class="appCard">
				<div class="container p-0">
					<div class="row">
						<?php
						while ($row_test = mysqli_fetch_array($productImageData)) {
							$productEventSQL = "SELECT * FROM tbl_product INNER JOIN tbl_event ON tbl_product.event_id = tbl_event.id WHERE tbl_product.id = '$row_test[product_id]'";
							$productEventData = mysqli_query($connect, $productEventSQL);
							$row_event = mysqli_fetch_array($productEventData);
						?>
							<div class="col-lg-3 col-md-4">
								<a href="UserIndex.php?usingPage=product&id=<?php echo $row_test['product_id'] ?>" class="w-100 display-block">
									<div class="product-container">
										<?php
										$imageSource = str_starts_with($row_test['content'], 'http') ? $row_test['content'] : "../../admin/pages/ProductImage/{$row_test['content']}";

										echo "<img src=\"{$imageSource}\" alt=\"{$row_test['name']}\">";

										if ($row_event['discount'] > 0) :
										?>
											<div class="discount-overlay"><?php echo "-" . $row_event['discount'] . '%'; ?></div>
										<?php endif; ?>
									</div>

									<h5 class="title_product mt-2"> <?php echo $row_test['name'] ?></h5>
									<div class="cdt-product-param"><span data-title="Loại Hàng"><i class="fa-solid fa-cart-arrow-down"></i> Like auth</span></div>
									<span style="text-decoration: line-through;" class="price_fake ml-3">
										<?php echo number_format($row_test['price'] * ($row_event['discount'] / 100) + $row_test['price'], 0, ',', '.') ?> đ
									</span>
									<b class="price_real ml-3">
										<?php echo number_format($row_test['price'], 0, ',', '.') . ' đ' ?>
									</b>
									<div class="sold flex justify-between mt-4">
										<span class="ml-3">
											Đã bán: <?php echo random_int(5, 100) ?>
										</span>
										<span class="mr-3">
											5 <i class="fa fa-star checked"></i>
										</span>
									</div>
								</a>
							</div>

						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>