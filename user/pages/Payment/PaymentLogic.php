<?php
include "../../../common/config/Connect.php";

if (isset($_POST['confirmBuy'])) {
    $order_id = $_POST['orderId'];
    $order_code - generateCode();
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $delivery_cost = $_POST['delivery'];
    $payment_method = $_POST['paymentMethod'];

    
}