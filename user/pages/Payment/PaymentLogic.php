<?php
include "../../../common/config/Connect.php";

if (isset($_POST['confirmBuy'])) {
    $order_id = $_POST['orderId'];
    echo $order_id . "\n";
    $phone = $_POST['phone'];
    echo $phone . "\n";

    var_dump($_POST);

    $province = $_POST['province'];
    // echo $province . "\n";
    echo "<br>selected city: " . $_POST['selectedCity'] . "<br>";

    $district = $_POST['district'];
    // echo $district . "\n";
    echo "selected district: " . $_POST['selectedDistrict'] . "<br>";

    $ward = $_POST['ward'];
    // echo $ward . "\n";
    echo "selected ward: " . $_POST['selectedWard'] . "<br>";
}
