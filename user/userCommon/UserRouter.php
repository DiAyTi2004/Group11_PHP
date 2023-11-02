<div class="main">
    <div class="maincontent">

        <?php
        if ($usingPage == 'danhmuclist') {
            include("../pages/danhmuc.php");
        } else if ($usingPage == 'giohang') {
            include("../pages/giohang/cart.php");
        } else if ($usingPage == 'dangky') {
            header("Location: ./UserSignUp.php");
        } else if ($usingPage == 'sanpham') {
            include("../pages/sanpham.php");
        } else if ($usingPage == 'dangnhap') {
            header("Location: UserLogin.php");
        } else if ($usingPage == 'thongtin') {
            include("../pages/info.php");
        } else if ($usingPage == 'timkiem') {
            include("../pages/timkiem.php");
        } else {
            include("../pages/Home/HomeIndex.php");
        }
        ?>

    </div>
</div>