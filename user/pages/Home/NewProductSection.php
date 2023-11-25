<?php
// GET id là lấy id từ bên MENU.php 

$sql_show_test = "SELECT * FROM tbl_product INNER JOIN tbl_product_image ON tbl_product.id = tbl_product_image.product_id
WHERE tbl_product_image.main_image = 1 LIMIT 5";
$query_show_test = mysqli_query($connect, $sql_show_test);
?>

<ul class="product_list">
    <?php
    while ($row_test = mysqli_fetch_array($query_show_test)) {
        $sql_show_event = "SELECT * FROM tbl_product INNER JOIN tbl_event ON tbl_product.event_id = tbl_event.id WHERE tbl_product.id = '$row_test[product_id]'";
        $query_show_event = mysqli_query($connect, $sql_show_event);
        $row_event = mysqli_fetch_array($query_show_event);
    ?>
        <li>
            <a href="UserIndex.php?usingPage=product&id=<?php echo $row_test['product_id'] ?>">
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
        </li>
    <?php
    }
    ?>
</ul>