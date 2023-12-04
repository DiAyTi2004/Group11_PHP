<?php
include "../../../common/config/Connect.php";

if (isset($_POST['deleteProduct'])) {
    $productId = $_GET['productId'];

    $deleteProductSql = "DELETE FROM tbl_cart_detail WHERE product_id ='" . $productId . "';";
    mysqli_query($connect, $deleteProductSql);

    header('Location:../../userCommon/UserIndex.php?usingPage=cart');
} else if (isset($_POST['confirmBuy'])) {
    //viết logic để tạo ra 1 order
    



    // var_dump($_POST['selectedPro']);
    $selectedPro = $_POST['selectedPro'];

    foreach ($selectedPro as $item) {
        echo "các dòng được chọn: \n";
        $tachChuoi = explode("diayti", $item);

        // Lấy các UUID từ mảng
        $cartId = $tachChuoi[0];
        $productId = $tachChuoi[1];
        $sizeId = $tachChuoi[2];

        echo "cartId : $cartId<br>";
        echo "productId: $productId<br>";
        echo "sizeId:  $sizeId<br>";
    }
}
