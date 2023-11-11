<?php
include "../../../common/config/Connect.php";
//xử lý hình anh
// $file = $_FILES['hinhanh'];
// $hinhanh = $file['name'];
// $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
// $hinhanhgio = time() . '_' . $hinhanh;
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

if (isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $categoryId = $_POST['categoryId'];
    $eventId = $_POST['eventId'];

    $productId = generateUuid();

    $insertSql = "INSERT INTO tbl_product(id, code, name, description, price, category_id, event_id) 
                        VALUES ('$productId', '$code', '$name', '$description', '$price', '$categoryId', '$eventId')";
    mysqli_query($connect, $insertSql);

    header('Location:../../AdminIndex.php?workingPage=product');
} else if (isset($_POST['editProduct'])) {
    $productId = $_GET['productId'];

    $name = $_POST['name'];
    $code = $_POST['code'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $categoryId = $_POST['categoryId'];
    $eventId = $_POST['eventId'];

    $updateSql = "
    UPDATE tbl_product 
    SET 
    code='$code', 
    name='$name', 
    description='$description', 
    price='$price', 
    category_id='$categoryId',
    event_id='$eventId'
    WHERE id='$productId';
    ";

    mysqli_query($connect, $updateSql);

    header('Location:../../AdminIndex.php?workingPage=product');
    var_dump($_POST);
    echo "catched: " . $productId . ' ' . $name . ' ' . $code . ' ' . $price . ' ' . $description . ' ' . $categoryId . ' ' . $eventId . ' ' . $updateSql;
} else if (isset($_POST['deleteProduct'])) {
    $productId = $_GET['productId'];

    $deleteProductSql = "DELETE FROM tbl_product WHERE id ='" . $productId . "';";
    mysqli_query($connect, $deleteProductSql);

    header('Location:../../AdminIndex.php?workingPage=product');
}
