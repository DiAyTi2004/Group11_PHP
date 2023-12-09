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
    $order_id = $_POST['orderId'];
    $order_code = generateCode();
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $district = $_POST['district'];

    $ward = $_POST['ward'];
    $address = $ward . ", " . $district . ", " . $province;
    echo $address . $_SESSION['userId'];
    $delivery_cost = $_POST['delivery'];
    $payment_method = $_POST['paymentMethod'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    // Create a DateTime object for the current time in the specified time zone
    $currentTime = new DateTime();
    
    // Format the current time as a string
    $currentTimeString = $currentTime->format('Y-m-d H:i:s');

    $sql = "INSERT INTO tbl_order (id, code, user_id, status_id, receive_phone, receive_address, delivery_cost, payment_id, description, createDate)
    VALUES ('$order_id', '$order_code', '$_SESSION[userId]', 'f1e30780-f494-477d-8fba-63d280843c91', '$phone', '$address', $delivery_cost, '$payment_method', '', '$currentTimeString')";

}