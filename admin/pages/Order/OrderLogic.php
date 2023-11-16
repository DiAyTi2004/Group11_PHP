<?php
include "../../../common/config/Connect.php";
$status_id = $_POST['statusId'];
$dienthoainhan = $_POST['dienthoainhan'];
$diachinhan = $_POST['diachinhan'];
$phigiaohang = $_POST['phigiaohang'];
$mota = $_POST['mota'];


function generateUuid()
{
    $data = random_bytes(16);

    // Set the version (4) and variant bits (2)
    $data[6] = chr(ord($data[6]) & 0x0F | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3F | 0x80);
    // Format the UUID string
    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    return $uuid;
}
if(isset($_POST['addOrder'])){
    $Id =  generateUuid();
    $add = "INSERT INTO tbl_order(id,user_id,status_id,receive_phone,receive_address,delivery_cost,description) 
    VALUES ('".$Id."','".$userId. "','".$status_id. "','".$dienthoainhan."','".$diachinhan."','".$phigiaohang."','".$mota."')";  
    mysqli_query($connect, $add);
    header('Location:../../AdminIndex.php?workingPage=order');
}
else if (isset($_POST['deleteOrder'])) {
    $id = $_POST['orderId'];
    echo $id;
    $sql_xoa = "DELETE FROM tbl_order WHERE id ='".$id."'";
    mysqli_query($connect, $sql_xoa);
    header('Location:../../AdminIndex.php?workingPage=order');
}
