<?php
    include "../../../common/config/Connect.php";
    $name=$_POST['hovatens'];
    $account = $_POST['taikhoans'];
    $email = $_POST['emails'];
    $numberphone = $_POST['dienthoais'];
    $address = $_POST['diachis'];
    $chucvu=$_POST['chucvus'];

    if (isset($_POST['themnguoidung'])) {
                $sql_them_nguoidung = "INSERT INTO tbl_dangky (hovaten, taikhoan,email,sodienthoai,diachi,chucvu ) 
                VALUES ($name, $account,$email,$address ,$chucvu)";
                mysqli_query($connect, $sql_them_nguoidung);
                header('Location:../../AdminIndex.php?workingPage=user');
            } 
    else if(isset($_POST['suanguoidung'])){
        $sql_sua_nd="UPDATE tbl_dangky SET hovaten='".$name."',taikhoan='".$account."',email='".$email."',sodienthoai='".$numberphone."',diachi='".$address."',chucvu='".$chucvu."' WHERE id_khachhang='$_GET[userId]'";
        mysqli_query($connect,$sql_sua_nd);
        header('Location:../../index.php?workingPage=User');
    }
    // else if(isset($_POST['xoanguoidung'])){
    else if(isset($_POST['xoanguoidung'])){
        $id=$_GET['userId'];
        $sql_xoa_nd="DELETE FROM tbl_dangky WHERE id_khachhang ='".$id."';";
        mysqli_query($connect,$sql_xoa_nd);
        header('Location:../../index.php?workingPage=User');
    }
    else{
       
    }
