<?php
include "../../../common/config/Connect.php";   
if (isset($_POST['deleteProduct'])) {
    $productId = $_GET['productId'];

    $deleteProductSql = "DELETE FROM tbl_cart_detail WHERE product_id ='" . $productId . "';";
    mysqli_query($connect, $deleteProductSql);

    header('Location:../../userCommon/UserIndex.php?usingPage=cart');
} else if(isset($_POST['confirmBuy'])) {
    
}
?>
