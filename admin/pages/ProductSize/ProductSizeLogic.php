<?php
include "../../../common/config/Connect.php";

if (isset($_POST['addProductSize'])) {
    $quantity = $_POST['quantity'];
    $productId = $_GET['productId'];
    $sizeId = $_POST['sizeId'];

    $addProductSizeSQL = "INSERT INTO tbl_product_size(product_id, size_id, quantity) 
                VALUES ('" . $productId . "','" . $sizeId . "','" . $quantity . "')";
    mysqli_query($connect, $addProductSizeSQL);
    echo "catched";
}

if (isset($_POST['editProductSize'])) {
    if ($banner != '') {
        $ProductSizeId = $_GET['id'];
        $description_img = $_POST['des_img'];
        if ($hinhanh != '') {
            move_uploaded_file($hinhanh_tmp, 'ProductSizeImages/' . $hinhanh);

            $sql_update_image = "UPDATE tbl_product_image SET description='$description_img', content='$hinhanh' WHERE id='$ProductSizeId'";
            mysqli_query($connect, $sql_update_image);
        }

        $sql_editProductSize = "UPDATE tbl_ProductSize SET code='" . $code . "', name='" . $name . "', banner='" . $banner . "', discount='" . $discount . "', start_date='" . $start_date . "',end_date='" . $end_date . "',
        description='" . $description . "' WHERE id='$_GET[id]'";
        $sql = "SELECT*FROM tbl_ProductSize WHERE id='$_GET[id]'";
        $query = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('ProductSizeImages/' . $row['banner']);
        }
    } else {
        $sql_editProductSize = "UPDATE tbl_ProductSize SET code='" . $code . "', name='" . $name . "', banner='" . $banner . "', discount='" . $discount . "', start_date='" . $start_date . "',end_date='" . $end_date . "',
        description='" . $description . "' WHERE id='$_GET[id]'";
    }
    mysqli_query($connect, $sql_editProductSize);
}

if (isset($_POST['deleteProductSize'])) {
    $id = $_GET['id'];
    $sql_deleteProductSize = "DELETE FROM tbl_product_size WHERE id ='" . $id . "';";
    mysqli_query($connect, $sql_deleteProductSize);
}

// header('Location:../../AdminIndex.php?workingPage=ProductSize');
