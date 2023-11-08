<?php
include "../../../common/config/Connect.php";
$madonhang = $_POST['madonhang'];
$idkhachhang = $_POST['idkhachhang'];;
$hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];
if(isset($_POST['addOrder'])){
    $add = "INSERT INTO tbl_giohang(code_cart,id_khachhang,cart_payment) VALUES ('".$madonhang. "','".$idkhachhang."','".$hinhthucthanhtoan."')";  
    mysqli_query($connect, $add);
    header('Location:../../AdminIndex.php?workingPage=order');
}
if (isset($_POST['deleteOrder'])) {
    $id = $_GET['orderId'];
    $sql_xoa = "DELETE FROM tbl_giohang WHERE id_cart ='" . $id . "'";
    mysqli_query($connect, $sql_xoa);
    header('Location:../../AdminIndex.php?workingPage=order');
}
