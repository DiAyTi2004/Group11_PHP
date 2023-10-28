<?php
    session_start();
    include "../../../common/config/Connect.php";
    //XÓA HẾT GIỎ HÀNG
    if(isset($_GET['xoatatca'])&& $_GET['xoatatca']=='xoahet'){
		unset($_SESSION['cart']);
		header('Location:../../../index.php?quanly=giohang');
	}

?>