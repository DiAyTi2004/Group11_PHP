<?php
$show_cart_sql = "SELECT * FROM tbl_cart_detail WHERE tbl_cart_detail.cart_id = '$_COOKIE[cartId]'";
$show_cart_query = mysqli_query($connect, $show_cart_sql);
$totalAmount = 0; // Initialize total amount
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="appCard">
        <table class="table">
            <legend class="text-center fw-bold">Quản lý giỏ hàng</legend>
            <thead>
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th class="text-center align-middle" scope="col">Size</th>
                    <th class="text-center align-middle" scope="col">Đơn giá</th>
                    <th class="text-center align-middle" scope="col">Số lượng</th>
                    <th class="text-center align-middle" scope="col">Số tiền</th>
                    <th class="text-center align-middle" scope="col">Thao tác</th>
                </tr>
            </thead>
            <?php
            while ($row_cart = mysqli_fetch_array($show_cart_query)) {
                $show_size_sql = "SELECT * FROM tbl_size
                WHERE tbl_size.id = '$row_cart[size_id]'";
                $show_size_query = mysqli_query($connect, $show_size_sql);
                $row_size = mysqli_fetch_array($show_size_query);

                $show_image_sql = "SELECT * FROM tbl_product_image WHERE product_id = '$row_cart[product_id]' AND main_image = 1;";
                $show_image_query = mysqli_query($connect, $show_image_sql);
                $row_image = mysqli_fetch_array($show_image_query);
            ?>
                <tr>
                    <td class="text-center align-middle">
                        <a style="text-decoration: none;" href="UserIndex.php?usingPage=product&id=<?php echo $row_cart['product_id'] ?>">
                            <div class="product_container flex">
                                <?php
                                $imageSource = str_starts_with($row_image['content'], 'http') ? $row_image['content'] : "../../admin/pages/ProductImage/{$row_image['content']}";

                                echo "<img style=\"width: 150px; height: 150px\" src=\"{$imageSource}\">";
                                ?>
                            </div>
                        </a>
                    </td>
                    <td class="text-center align-middle">
                        <?php echo preg_replace('/\D/', '', $row_size['name']); ?>
                    </td>
                    <td class="text-center align-middle">
                        <span class="price_real">
                            <?php echo number_format($row_cart['unit_price'], 0, ',', '.') . ' đ' ?>

                        </span>
                    </td>
                    <td class="text-center align-middle">
                        <?php echo $row_cart['quantity'] ?>
                    </td>
                    <td class="text-center align-middle">
                        <span class="price_real">
                            <?php echo number_format($row_cart['quantity'] * $row_cart['unit_price'], 0, ',', '.') . ' đ' ?>
                        </span>
                    </td>
                    <td class="text-center align-middle">
                        <!-- Buttons to increase and decrease quantity -->
                        <button type="button" class="btn btn-primary" data-product-id="<?php echo $row_cart['product_id']; ?>">Chỉnh sửa</button>
                        <button type="button" class="btn btn-danger remove-btn" data-product-id="<?php echo $row_cart['product_id']; ?>">Xoá</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <button type="button" class="btn btn-success float-end mt-3 p-3">
    <i class="fa-solid fa-cart-shopping mr-2 ml-0"></i>
    Mua hàng</button>
</body>

</html>