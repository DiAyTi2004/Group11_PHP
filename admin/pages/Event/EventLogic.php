<?php
include "../../../common/config/Connect.php";
$tensukien = $_POST['tensukien'];
$masanpham = $_POST['masp'];
$giasanpham = $_POST['giasp'];
$soluong = $_POST['soluong'];
//xử lý hình anh
$file = $_FILES['hinhanh'];
$hinhanh = $file['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanhgio = time() . '_' . $hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$hienthi = $_POST['hienthi'];
$danhmuc = $_POST['danhmuc'];

if (isset($_POST['themsanpham'])) {
    if (isset($_FILES['hinhanh'])) {
        if ($file['type'] == 'image/jpeg' || $file['type'] == 'imgae/jpg' || $file['type'] == 'image/png') {

            move_uploaded_file($hinhanh_tmp, 'EventImages/' . $hinhanh);

            $sql_themsp = "INSERT INTO tbl_sanpham(tensukien,masanpham,giasanpham,soluong,hinhanh,tomtat,noidung,trangthai,id_danhmuc) 
                VALUE ('" . $tensukien . "','" . $masanpham . "','" . $giasanpham . "','" . $soluong . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "'," . $hienthi . ",'" . $danhmuc . "')";
            mysqli_query($connect, $sql_themsp);
            header('Location:../../AdminIndex.php?workingPage=event');
        } else {
            $hinhanh = '';
            header('Location:../../AdminIndex.php?workingPage=event&query=edit');
        }
    }
} else if (isset($_POST['suasanpham'])) {
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'EventImages/' . $hinhanh);
        $sql_sua = "UPDATE tbl_sanpham SET tensukien='" . $tensukien . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',hinhanh='" . $hinhanh . "',
            tomtat='" . $tomtat . "',noidung='" . $noidung . "',trangthai='" . $hienthi . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";

        $sql = "SELECT*FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('EventImages/' . $row['hinhanh']);
        }
    } else {
        $sql_sua = "UPDATE tbl_sanpham SET tensukien='" . $tensukien . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',tomtat='" . $tomtat . "',
            noidung='" . $noidung . "',trangthai='" . $hienthi . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($connect, $sql_sua);
    header('Location:../../AdminIndex.php?workingPage=event');
} else {

    $id = $_GET['idsanpham'];
    $sql = "SELECT *FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('EventImages/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham ='" . $id . "';";
    mysqli_query($connect, $sql_xoa);
    header('Location:../../AdminIndex.php?workingPage=event');
}
