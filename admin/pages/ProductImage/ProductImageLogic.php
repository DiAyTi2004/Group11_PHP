<?php
include "../../../common/config/Connect.php";
$productId = "";
$imageId = "";

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

$uploads_dir = 'Images/'; // Đường dẫn tới thư mục lưu trữ ảnh
$file = $_FILES['images'];
if (isset($_POST['addProductImage'])) {
    $productId = $_GET['productId'];
    $description = $_POST['description'];

    if (isset($_FILES['images'])) {
        $file = $_FILES['images'];
        // Kiểm tra loại file
        if ($file['type'][0] == 'image/jpeg' || $file['type'][0] == 'image/jpg' || $file['type'][0] == 'image/png') {
            foreach ($file['name'] as $key => $fileName) {
                $content = ""; // Khởi tạo biến content trước vòng lặp
                $content = $uploads_dir . $fileName; // Lưu đường dẫn của ảnh vào content
                $main_image = (isset($_POST['main_image']) && $_POST['main_image'] == $key) ? 1 : 0;
                $imageId = generateUuid();
                move_uploaded_file($file['tmp_name'][$key], $uploads_dir . $fileName); // Di chuyển ảnh đến thư mục lưu trữ
                $addProductimageSQL = "INSERT INTO tbl_product_image(id, product_id, description, content, main_image) 
                        VALUES ('" . $imageId . "','" . $productId . "','" . $description . "','" . $content . "', '" . $main_image . "')";
                mysqli_query($connect, $addProductimageSQL);
            }
        } else {
            echo "Loại file không hợp lệ.";
        }
    }
}


if (isset($_POST['editProductImage'])) {
    $productId = $_GET['productId'];
    $newimageId = $_POST['imageId'];
    $oldimageId = $_GET['imageId'];
    if (isset($_FILES['newimage'])) {
        $newFile = $_FILES['newimage'];
        // Kiểm tra loại file
        if ($newFile['type'] == 'image/jpeg' || $newFile['type'] == 'image/jpg' || $newFile['type'] == 'image/png') {
                $content = ""; // Khởi tạo biến content trước vòng lặp
                $content = $uploads_dir . $newFileName; // Lưu đường dẫn của ảnh vào content
                $newmain = (isset($_POST['newmain'])) ? 1 : 0;
                $imageId = generateUuid();
                move_uploaded_file($newFile['tmp_name'][$key], $uploads_dir . $newFileName); // Di chuyển ảnh đến thư mục lưu trữ
                $updateProductImageSQL = "UPDATE tbl_product_image(id, product_id, description, content, main_image) 
                        SET ('" . $newimageId . "','" . $productId . "','" . $description . "','" . $content . "', '" . $newmain . "')
                        WHERE product_id = '$productId' AND id = '$oldimageId'
                        ";
                mysqli_query($connect, $updateProductImageSQL);
            }
        } else {
            echo "Loại file không hợp lệ.";
        }
    }


if (isset($_POST['deleteProductImage'])) {
    $productId = $_GET['productId'];
    $imageId = $_GET['imageId'];
    $deleteProductImageSQL = "DELETE FROM tbl_product_image WHERE product_id ='$productId' AND id = '$imageId';";

    mysqli_query($connect, $deleteProductImageSQL);
}

header("Location: ../../AdminIndex.php?workingPage=productImage&productId=" . $productId);
