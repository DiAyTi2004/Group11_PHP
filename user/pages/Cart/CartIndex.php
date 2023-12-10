<?php
$show_cart_sql = "SELECT * FROM tbl_cart_detail WHERE tbl_cart_detail.cart_id = '$_COOKIE[cartId]'";
$show_cart_query = mysqli_query($connect, $show_cart_sql);
$cart_empty = mysqli_num_rows($show_cart_query) == 0; // Check if the cart is empty
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
    <?php if ($cart_empty) : ?>
        <div class="appCard text-center">
            <h1>
                <legend class="text-center fw-bold">Quản lý giỏ hàng</legend>

            </h1>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRd13XUAZxw6HVjjX4QJX9bjWd4tXmY1Uh4cQ&usqp=CAU" alt="">
            <p>Giỏ hàng của bạn đang trống. Hãy quay lại xem các sản phẩm nhé!</p>
            <a href="../../user/userCommon/UserIndex.php" class="btn btn-success mr-2"><i class="fa-solid fa-house mr-2"></i>Quay lại trang chủ</a>
        </div>
    <?php else : ?>
        <form action="../../user/pages/Cart/CartLogic.php" method="post">
            <div class="appCard">
                <table class="table">
                    <legend class="text-center fw-bold">Quản lý giỏ hàng</legend>
                    <thead>
                        <tr>
                            <th scope="col">Chọn</th>
                            <th class="text-center align-middle" scope="col">Mã</th>
                            <th scope="col">Sản phẩm</th>
                            <th class="text-center align-middle" scope="col">Tên sản phẩm</th>
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

                        $totalPrice = $row_cart['unit_price'] * $row_cart['quantity'];

                        $rowCartId = $_COOKIE['cartId'];
                        $rowProductId = $row_cart['product_id'];
                        $rowSizeId = $row_cart['size_id'];

                        $show_product_query = mysqli_query($connect, "SELECT * FROM tbl_product WHERE id = '$row_cart[product_id]'");
                        $row_product = mysqli_fetch_array($show_product_query);

                        $compositeKey = $rowCartId . "diayti" . $rowProductId . "diayti" . $rowSizeId;
                    ?>
                        <tr>
                            <!-- Inside the while loop where you output the table rows -->
                            <td style="height: 170px;" class="text-center align-middle d-flex justify-content-center align-items-center">
                                <input style="padding: 9px;" class="form-check-input" type="checkbox" name="selectedPro[]" value="<?php echo $compositeKey; ?>">
                            </td>

                            <td class="text-center align-middle">
                                <?php echo $row_product['code']; ?>
                            </td>
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
                            <td style="max-width: 150px; font-size: 15px;" class="text-center align-middle">
                                <?php echo $row_product['name']; ?>
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
                                <span class="price_real" id="total_Price">
                                    <?php echo number_format($totalPrice, 0, ',', '.') . ' đ' ?>

                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editPopup_<?php echo $row_cart['product_id']; ?>_<?php echo $row_cart['size_id']; ?>">
                                    <i class="fa-solid fa-pencil"></i>
                                    Chỉnh sửa</button>
                                <button type="button" class="btn btn-danger remove-btn" data-bs-toggle="modal" data-bs-target="#confirmPopup_<?php echo $row_cart['product_id']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                    Xoá</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <input type="hidden" name="totalAmount">

            <div class="text-end mt-3">
                Tổng số tiền: <span id="totalAmountDisplay" class="price_real"></span>
                <?php
                if (isset($_SESSION['userId'])) {
                ?>
                    <button name="confirmBuy" type="submit" class="btn btn-success p-3" id="buyButton">
                        <i class="fa-solid fa-cart-shopping mr-2 ml-0"></i>
                        Mua hàng
                    </button>
                <?php } else {
                ?>
                    <button disabled name="confirmBuy" type="submit" class="btn btn-success p-3" id="buyButton">
                        <i class="fa-solid fa-cart-shopping mr-2 ml-0"></i>
                        Vui lòng đăng nhập để mua hàng
                    </button>
                <?php } ?>
            </div>
        </form>

        <script>
            $(document).ready(function() {
                updateTotalAmount();

                // Handle checkbox changes
                $('input[name="selectedPro[]"]').change(function() {
                    updateTotalAmount();
                });

                // Function to update total amount based on selected checkboxes
                function updateTotalAmount() {
                    var totalAmount = 0;

                    $('input[name="selectedPro[]"]:checked').each(function() {
                        // Update the indices used to access quantity and unit price
                        var quantity = parseInt($(this).closest('tr').find('.text-center.align-middle:eq(6)').text()); // Updated index
                        var unitPriceText = $(this).closest('tr').find('.text-center.align-middle:eq(5) .price_real').text(); // Updated index

                        // Remove non-numeric characters except for the dot
                        var unitPrice = parseInt(unitPriceText.replace(/[^\d]/g, ''));

                        totalAmount += quantity * unitPrice;
                    });

                    // Update the display
                    $('#totalAmountDisplay').text(formatCurrency(totalAmount));
                }

                // Function to format currency with commas
                function formatCurrency(amount) {
                    return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' đ';
                }
            });
        </script>


        <!-- Thêm đoạn mã JavaScript này sau thẻ </script> trong đoạn mã bạn đã có -->
        <script>
            $(document).ready(function() {
                // Intercept the form submission
                $('form').submit(function(e) {
                    // Check if at least one checkbox is checked
                    if ($('input[name="selectedPro[]"]:checked').length === 0) {
                        // Display an alert or a custom message
                        alert("Vui lòng chọn ít nhất một sản phẩm trước khi mua hàng.");

                        // Prevent the form submission
                        e.preventDefault();
                    }
                });
            });
        </script>

        <!-- pre delete -->
        <?php
        $show_cart_query = mysqli_query($connect, $show_cart_sql);

        while ($row_cart = mysqli_fetch_array($show_cart_query)) {
            include "../../user/pages/Cart/CartConfirmDeletePopup.php";
        }
        ?>
        <!-- pre edit -->
        <?php
        $show_cart_query = mysqli_query($connect, $show_cart_sql);

        while ($row_cart = mysqli_fetch_array($show_cart_query)) {
            include "../../user/pages/Cart/EditQuantityPopup.php";
        }
        ?>
    <?php endif; ?>
</body>

</html>