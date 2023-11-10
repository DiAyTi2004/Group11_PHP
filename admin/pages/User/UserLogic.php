<?php
include "../../../common/config/Connect.php";
$tennguoidung = $_POST['tennguoidung'];
$taikhoan = $_POST['taikhoan'];
$email = $_POST['email'];
$diachi = $_POST['diachi'];
$code = $_POST['code'];
$phonenumber = $_POST['phonenumber'];
//xử lý hình anh
$file = $_FILES['hinhanh'];
$hinhanh = $file['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$chucvu = $_POST['chucvu'];
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

// Example usage

if (isset($_POST['themnguoidung'])) {
    if (isset($_FILES['hinhanh'])) {
        move_uploaded_file($hinhanh_tmp, 'UserImages/' . $hinhanh);
        $sql_sua = "UPDATE tbl_user SET code='". $code ."' fullname='" . $tennguoidung . "',username='" . $taikhoan . "',
            email='" . $email . "',phonenumber='" . $phonenumber . "',user_image='" . $hinhanh . "',
            chucvu='" . $chucvu . "',diachi='" . $diachi . "' WHERE id_sanpham='$_GET[productId]'";

        $sql = "SELECT*FROM tbl_user WHERE id='$_GET[userId]' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('UserImages/' . $row['hinhanh']);
        }
    }
}
 else if (isset($_POST['editUser'])) {
    if ($file != '') {
        move_uploaded_file($hinhanh_tmp, 'UserImages/' . $hinhanh);
        $sql_editUser = "UPDATE tbl_user SET code='" . $code . "', fullname='" . $tennguoidung . "', user_image='" . $hinhanh . "', username='" . $taikhoan . "', email='" . $email . "',phonenumber='" . $phonenumber . "',
        chucvu='" . $chucvu . "',address = '". $diachi ."' WHERE id='$_GET[userId]'";
        $query = mysqli_query($connect, $sql_editUser);
        while ($row = mysqli_fetch_array($query)) {
            unlink('UserImages/' . $row['hinhanh']);   
        }
    } else {
        $sql_editUser = "UPDATE tbl_user SET code='" . $code . "', fullname='" . $tennguoidung . "', user_image='" . $hinhanh . "', username='" . $taikhoan . "', email='" . $email . "',phonenumber='" . $phonenumber . "',
        chucvu='" . $chucvu . "',address = '". $diachi ."' WHERE id='$_GET[userId]'";
    }
    mysqli_query($connect, $sql_editUser);
    header('Location:../../AdminIndex.php?workingPage=user');
    } 
else if (isset($_POST['deleteEvent'])) {
    $id = $_GET['id'];
    echo $id;
    $sql = "SELECT *FROM tbl_event WHERE id = '$id'";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('EventtImages/' . $row['banner']);
    }
    $sql_deleteEvent = "DELETE FROM tbl_event WHERE id ='" . $id . "';";
    mysqli_query($connect, $sql_deleteEvent);
    header('Location:../../AdminIndex.php?workingPage=event');
}
