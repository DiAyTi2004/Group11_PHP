<?php
// GET id là lấy id từ bên MENU.php 

$sql_show_test = "SELECT * FROM tbl_product INNER JOIN tbl_product_image ON tbl_product.id = tbl_product_image.product_id
WHERE tbl_product_image.main_image = 1";
$query_show_test = mysqli_query($connect, $sql_show_test);
?>

<ul class="product_list">
    <?php
    while ($row_test = mysqli_fetch_array($query_show_test)) {
    ?>
        <li>
            <a href="UserIndex.php?usingPage=product&id=<?php echo $row_test['product_id'] ?>">
                <img src="../../admin/pages/ProductImage/<?php echo $row_test['content'] ?>">
                <p></p>
                <h5 class="title_product"> <?php echo $row_test['name'] ?></h5>
                <h5 class="price_product">Giá: <?php echo number_format($row_test['price'], 0, ',', '.') . ' VNĐ' ?></h5>
                <p style="text-align: center;"><?php echo "Xem chi tiết" ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>