<?php
include "../../../common/config/Connect.php";
$madonhang = $_POST['madonhang'];
$idkhachhang = $_POST['idkhachhang'];;
$hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];
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
    $add = "INSERT INTO tbl_giohang(id_cart,code_cart,id_khachhang,cart_payment) VALUES ('".$Id."','".$madonhang. "','".$idkhachhang."','".$hinhthucthanhtoan."')";  
    mysqli_query($connect, $add);
    header('Location:../../AdminIndex.php?workingPage=order');
}
else if (isset($_POST['delete'])) {
    $id = $_GET['orderId'];
    $sql_xoa = "DELETE FROM tbl_giohang WHERE id_cart ='".$id."'";
    mysqli_query($connect, $sql_xoa);
    header('Location:../../AdminIndex.php?workingPage=order');
}
