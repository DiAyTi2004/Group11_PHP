<?php
$sql_lietke_dh = "SELECT * FROM tbl_giohang ,tbl_dangky  WHERE tbl_giohang.id_khachhang=tbl_dangky.id_khachhang ORDER BY id_cart DESC";
$result_lietke_dh = mysqli_query($connect, $sql_lietke_dh);
?>
<link rel="stylesheet" href="./styles/OrderStyles.css">

<div class="container p-0">

<legend class="text-center"><b>Danh sách đơn hàng của người dùng</b></legend>
    <table style="width: 100%;" border="1" style="border-collapse:collapse;">
    <thead class="table-head w-100">
        <tr>
            <th class="noWrap">ID</th>
            <th class="noWrap">Mã đơn hàng</th>
            <th class="noWrap">Tên khách hàng</th>
            <th class="noWrap">Địa chỉ</th>
            <th class="noWrap">Tài khoản</th>
            <th class="noWrap">Hình thức thanh toán</th>
            <th class="noWrap">Điện thoại</th>
            <th class="noWrap"> Tinh Trạng </th>
            <th colspan="2">Quản lý </th>
        </tr>
    </thead>
    <tbody class="table-body">
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result_lietke_dh)) {
            $i++;

        ?>
        
            <tr>
                <td class="noWrap"><?php echo $i ?></td>
                <td class="noWrap"><?php echo $row['code_cart'] ?></td>
                <td class="noWrap"><?php echo $row['hovaten'] ?></td>
                <td class="noWrap"><?php echo $row['diachi'] ?></td>
                <td class="noWrap"><?php echo $row['taikhoan'] ?></td>
                <td class="noWrap"><?php echo $row['cart_payment'] ?></td>
                <td class="noWrap"><?php echo $row['sodienthoai'] ?></td>
                <td class="noWrap">
                    <?php if ($row['cart_status'] == 1) {
                        echo '<a href="modules/order/OrderLogic.php?code=' . $row['code_cart'] . '">Đơn hàng mới</a>';
                    } else {
                        echo 'Đã xem';
                    }
                    ?>
                </td>
                <td class="noWrap">
                    <a href="index.php?action=order&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>|
                <td><a href="modules/order/OrderLogic.php?iddonhang=<?php echo $row['code_cart'] ?>">Xóa</a></td>
                </td>
            </tr>
         
        <?php
        }
        ?>
        </tbody>
    </table>
</div>