<?php

$categoryId = $_GET['categoryId'] || "";
$findProductByCategoryIdSQL = "SELECT * FROM tbl_product WHERE tbl_product.category_id ='$categoryId'";
$productData = mysqli_query($connect, $findProductByCategoryIdSQL);

$sql_cate = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($connect, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>

<p></p>
<h5> Danh mục |
    <?php
    if (isset($row_title['name'])) {
        echo $row_title['name'];
    }
    ?>
</h5>
<ul class="product_list">
    <?php
    while ($row_pro = mysqli_fetch_array($productData)) {
    ?>
        <li>
            <a href="UserIndex.php?usingPage=product&id=<?php echo $row_pro['id_sanpham'] ?>">
                <img src="../../admin/pages/Product/ProductImages/<?php echo $row_pro['hinhanh'] ?>">
                <p></p>
                <h5 class="title_product"> <?php echo $row_pro['tensanpham'] ?></h5>
                <h5 class="price_product">Giá: <?php echo number_format($row_pro['giasanpham'], 0, ',', '.') . ' VNĐ' ?></h5>
                <p style="text-align: center;"><?php echo "Xem chi tiết" ?></p>
            </a>
        </li>
    <?php
    }
    ?>

</ul>