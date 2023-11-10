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
    $quantity = $_POST['quantity'];
    $description = $_POST['des'];
    $categoryname = $_POST['categoryname'];

    // Handle image upload
    if (isset($_FILES['hinhanh'])) {
        $file = $_FILES['hinhanh'];
        if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png') {
            $hinhanh_tmp = $file['tmp_name'];
            $hinhanh = time() . '_' . $file['name'];
            move_uploaded_file($hinhanh_tmp, 'ProductImages/' . $hinhanh);

            // Generate UUIDs for product and image
            $productId = generateUuid();
            $imageId = generateUuid();

            // Insert data into tbl_product
            $sql_insert_product = "INSERT INTO tbl_product(id, code, name, description, quantity, price, category_id, event_id) 
                                   VALUES ('$productId', '$code', '$name', '$description', '$quantity', '$price', '$categoryId', '$eventId')";
            mysqli_query($connect, $sql_insert_product);

            // Insert data into tbl_product_image
            $sql_insert_product_image = "INSERT INTO tbl_product_image(id, product_id, description, content, main_image) 
                                        VALUES ('$imageId', '$productId', '$description', '$hinhanh', '1')";
            mysqli_query($connect, $sql_insert_product_image);

            // Insert data into tbl_product_size (adjust with actual size data)
            $sizeId = generateUuid();
            $sql_insert_product_size = "INSERT INTO tbl_product_size(product_id, size_id, quantity) 
                                       VALUES ('$productId', '$sizeId', '$quantity')";
            mysqli_query($connect, $sql_insert_product_size);

            // Redirect after successful insertion
            header('Location:../../AdminIndex.php?workingPage=product');
        } else {
            // Handle case where file type is not supported
            $hinhanh = '';
            header('Location:../../AdminIndex.php?workingPage=product');
        }
    }
} else if (isset($_POST['editProduct'])) {
    $productId = $_GET['productId'];  // Assuming productId is passed through GET parameter
    $description_img = $_POST['des_img'];
    // Process image upload if a new image is provided
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'ProductImages/' . $hinhanh);

        // Update tbl_product_image
        $sql_update_image = "UPDATE tbl_product_image SET description='$description_img', content='$hinhanh' WHERE product_id='$productId'";
        mysqli_query($connect, $sql_update_image);
        header('Location: ../../AdminIndex.php?workingPage=product');
    }

    // Update tbl_product
    $sql_sua_product = "UPDATE tbl_product SET 
        code='$code', 
        name='$name', 
        description='$description', 
        quantity='$quantity', 
        price='$price', 
        category_id='$categoryId'
        WHERE id='$productId'";
    mysqli_query($connect, $sql_sua_product);

    // Update tbl_product_size (adjust with actual size data)
    $sql_sua_size = "UPDATE tbl_product_size SET quantity='$quantity' WHERE product_id='$productId'";
    mysqli_query($connect, $sql_sua_size);

    header('Location: ../../AdminIndex.php?workingPage=product');
}
 else if (isset($_POST['deleteProduct'])) {
    $id = $_GET['productId'];
    $sql = "SELECT *FROM tbl_product WHERE id = '$productId'";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('ProductImages/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_product WHERE id_sanpham ='" . $productId . "';";
    mysqli_query($connect, $sql_xoa);

    header('Location:../../AdminIndex.php?workingPage=product');
}
