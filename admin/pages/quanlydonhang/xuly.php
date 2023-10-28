<?php
include "../../../common/config/Connect.php";
if (isset($_GET['code'])) {
    $code_cart = $_GET['code'];
    $sql_update = "UPDATE tbl_giohang SET cart_status=0 WHERE code_cart='" . $code_cart . "'";
    $query = mysqli_query($connect, $sql_update);
    header('Location:../../index.php?action=order&query=them');
}
if (isset($_GET['iddonhang'])) {
    $id = $_GET['iddonhang'];
    $sql_delete = "DELETE FROM tbl_giohang WHERE  code_cart='$id'";
    mysqli_query($connect, $sql_delete);
    $sql_delete_cart_detail = "DELETE FROM tbl_cart_old_detail WHERE  code_cart='$id'";
    mysqli_query($connect, $sql_delete_cart_detail);
    header('Location:../../index.php?action=order&query=them');
}
