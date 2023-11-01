<?php
include "../../../common/config/Connect.php";
$ngaybatdau = $_POST['start_date'];
$ngayketthuc = $_POST['end_date'];
$giamgia = $_POST['discount'];
$banner = $_POST['banner'];

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

if (isset($_POST['themsukien'])) {
    $eventId =  generateUuid();
    $sql_themsk = "INSERT INTO tbl_event(id, start_date, end_date, discount, banner) 
                VALUE ('" . $eventId . "','" . $ngaybatdau . "','" . $ngayketthuc . "','" . $giamgia . "','" . $banner . "')";
    mysqli_query($connect, $sql_themsk);
    header('Location:../../AdminIndex.php?workingPage=event');
} else if (isset($_POST['suasukien'])) {
    $sql_suask = "UPDATE tbl_event SET start_date='" . $start_date . "',end_date='" . $end_date . "',
    discount='" . $discount . "',banner='" . $banner . "' WHERE id='$_GET[id]'";
    mysqli_query($connect, $sql_suask);
    header('Location:../../AdminIndex.php?workingPage=event&query=edit');
} else {
    $id = $_GET['id'];
    $sql = "SELECT *FROM tbl_event WHERE id_event = '$id' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $sql_xoa = "DELETE FROM tbl_event WHERE id ='" . $id . "';";
    mysqli_query($connect, $sql_xoa);
    header('Location:../../AdminIndex.php?workingPage=event&query=xoa');
}
