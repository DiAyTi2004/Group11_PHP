<link rel="stylesheet" href="./styles/PrintOrderPageStyles.css">
<?php
$getAllOrderSQL = "SELECT * FROM tbl_product INNER JOIN tbl_order_detail ON tbl_order_detail.product_id = tbl_product.id WHERE tbl_order_detail.order_id = '$row[id]';";

$tableOrderData = mysqli_query($connect, $getAllOrderSQL);
?>
<div id="printOrder_<?php echo $row['id']; ?>">
    <div class="orderContainer" style="align-items: center;">
        <div class="logo">
            <img src="./../../user/userCommon/images/logo.svg" alt="logo">
        </div>
        <div class="orderInfo">
            <h2 style="text-align: center;">Hóa Đơn</h2>
            <p><strong>Mã Đơn Hàng:</strong> <?php echo $row['code'] ?></p>
            <p><strong>Điện Thoại Nhận Hàng:</strong> <?php echo $row['receive_phone'] ?></p>
            <p><strong>Địa Chỉ Nhận:</strong> <?php echo $row['receive_address'] ?></p>
            <p><strong>Phí Giao Hàng:</strong> <?php echo $row['delivery_cost'] ?></p>
            <p><strong>Mô Tả:</strong> <?php echo $row['description'] ?></p>
        </div>

        <div class="product-table">
            <table border="1" class="w-100">
                <thead class="table-head w-100">
                    <tr>
                        <th class='col-1' style="text-align: center;">STT</th>
                        <th class='col-2' style="text-align: center;">Mã Sản Phẩm</th>
                        <th class='col-4' style="text-align: center;">Tên Sản Phẩm</th>
                        <th class='col-1' style="text-align: center;">Số Lượng</th>
                        <th class='col-2' style="text-align: center;">Đơn Giá</th>
                        <th class='col-3' style="text-align: center;">Thành Tiền</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php
                    $displayOrder = 0;
                    $total = $row['delivery_cost'];
                    while ($rowOrderData = mysqli_fetch_array($tableOrderData)) {
                        $displayOrder++;
                        $total += $rowOrderData['unit_price'];
                    ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo $displayOrder ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $rowOrderData['code']; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $rowOrderData['name']; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $rowOrderData['quantity']; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $rowOrderData['unit_price']; ?>
                            </td>
                            <td style="text-align: right;">
                                <?php echo ($rowOrderData['quantity'] * $rowOrderData['unit_price']) . ' (VNĐ)'; ?>
                            </td>
                        </tr>
                    <?php
                    }
                    if ($displayOrder == 0) {
                    ?>
                        <tr>
                            <td colspan="5">
                                <?php echo "Hiện không có sản phẩm nào trong đơn hàng này!" ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="total">
            <p><strong>Tổng Tiền:</strong> <?php echo $total . ' (VNĐ)' ?></p>
        </div>
    </div>
</div>