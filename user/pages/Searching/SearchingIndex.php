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

?>
<h3>Từ khoá tìm kiếm : <?php echo $_POST['keyword']; ?></h3>

<ul class="product_list">
	<?php
	while ($row = mysqli_fetch_array($searchData)) {
	?>
		<li>
			<a href="UserIndex.php?usingPage=product&id=<?php echo $row['id_sanpham'] ?>">
				<img src="../../admin/pages/Product/ProductImages/<?php echo $row['hinhanh'] ?>">
				<p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham'] ?></p>
				<p class="price_product">Giá : <?php echo number_format($row['giasanpham'], 0, ',', '.') . 'vnđ' ?></p>
				<p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
			</a>
		</li>
	<?php
	}
	?>
</ul>