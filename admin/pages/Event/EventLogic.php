<?php
include "../../../common/config/Connect.php";
$ngaybatdau = $_POST['start_dates'];
$ngayketthuc = $_POST['end_date'];
$giamgia = $_POST['discount'];
$banner = $_POST['banner'];

if (isset($_POST['themsukien'])) {
    $sql_themsk = "INSERT INTO tbl_event(start_dates, end_date, discount, banner) 
                VALUE ('" . $ngaybatdau . "','" . $ngayketthuc . "','" . $giamgia . "','" . $banner . "')";
    mysqli_query($connect, $sql_themsk);
    header('Location:../../AdminIndex.php?workingPage=event&query=them');
} else if (isset($_POST['suasukien'])) {
    $sql_suask = "UPDATE tbl_event SET start_dates='" . $start_dates . "',end_date='" . $end_date . "',
    discount='" . $discount . "',banner='" . $banner . "' WHERE id='$_GET[id]'";
    mysqli_query($connect, $sql_suask);
    header('Location:../../AdminIndex.php?workingPage=event&query=sua');
} else {
    $id = $_GET['id'];
    $sql = "SELECT *FROM tbl_event WHERE id_event = '$id' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $sql_xoa = "DELETE FROM tbl_event WHERE id ='" . $id . "';";
    mysqli_query($connect, $sql_xoa);
    header('Location:../../AdminIndex.php?workingPage=event&query=xoa');
}
