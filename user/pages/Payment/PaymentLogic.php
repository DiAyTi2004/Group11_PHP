<?php
include "../../../common/config/Connect.php";
function generateCode()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < 8; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}
if (isset($_POST['confirmBuy'])) {
    $user_Id = $_GET['userId'];
    $order_id = $_POST['orderId'];
    $order_code = generateCode();
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    // id của chờ xác nhận
    $status_id = 'f1e30780-f494-477d-8fba-63d280843c91'; 
    $ward = $_POST['ward'];
    $address = $ward . ", " . $district . ", " . $province;
    echo $address, "<br>";
    echo $user_Id;
    $delivery_cost = $_POST['delivery'];
    $payment_method = $_POST['paymentMethod'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentTime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO tbl_order (id, code, user_id, status_id, receive_phone, receive_address, delivery_cost, payment_id, description, createDate)
    VALUES ('$order_id', '$order_code', '$user_Id', '$status_id', '$phone', '$address', $delivery_cost, '$payment_method', '', '$currentTime')";

    mysqli_query($connect, $sql);
    echo $order_id;

    $product_ids_str = $_POST['productIds'];
    $product_ids = explode(',', $product_ids_str);

    foreach ($product_ids as $productId) {
        $delSql = "DELETE FROM tbl_cart_detail WHERE product_id = '$productId'";
        mysqli_query($connect, $delSql);
    }
    header('Location:../../userCommon/UserIndex.php?usingPage=done');
}
