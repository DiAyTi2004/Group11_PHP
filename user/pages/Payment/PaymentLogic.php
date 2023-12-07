<?php
include "../../../common/config/Connect.php";

if (isset($_POST['confirmBuy'])) {
    $order_id = $_POST['orderId'];
    echo $order_id . "\n";
    $phone = $_POST['phone'];
    echo $phone . "\n";

    $city = $_POST['city'];
    echo $city . "\n";

    $district = $_POST['district'];
    echo $district . "\n";

    $ward = $_POST['ward'];
    echo $ward . "\n";


} 
