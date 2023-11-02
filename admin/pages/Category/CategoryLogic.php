<?php
include "../../../common/config/Connect.php";
$name = $_POST['tensanpham'];
$masanpham = $_POST['masp'];
$id_danhmuc = $_POST['id_danhmuc'];


if (isset($_POST['them'])) {
    

            $sql_themsp = "INSERT INTO tbl_category(name,id) 
                VALUE ('" . $name. "','" . $id . "')";
            mysqli_query($connect, $sql_themsp);
            header('Location:../../AdminIndex.php?workingPage=category&query=them');
       

} else if (isset($_POST['suasanpham'])) {
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'categoryImages/' . $hinhanh);
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',id_danhmuc='" . $id_danhmuc . "',hinhanh='" . $hinhanh . "',
            tomtat='" . $tomtat . "',noidung='" . $noidung . "',trangthai='" . $hienthi . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";

        $sql = "SELECT*FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('CategoryImages/' . $row['hinhanh']);
        }
    } else {
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',id_danhmuc='" . $id_danhmuc . "',tomtat='" . $tomtat . "',
            noidung='" . $noidung . "',trangthai='" . $hienthi . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($connect, $sql_sua);
    header('Location:../../AdminIndex.php?workingPage=category&query=them');
} else {

    $id = $_GET['idsanpham'];
    $sql = "SELECT *FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('CategoryImages/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham ='" . $id . "';";
    mysqli_query($connect, $sql_xoa);
    header('Location:../../AdminIndex.php?workingPage=Category&query=them');
}
