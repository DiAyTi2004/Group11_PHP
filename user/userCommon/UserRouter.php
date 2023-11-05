<div class="main">
    <div class="maincontent">

        <?php
        if ($usingPage == 'danhmuclist') {
            include("../pages/danhmuc.php");
        } else if ($usingPage == 'cart') {
            include("../pages/Cart/CartIndex.php");
        } else if ($usingPage == 'signup') {
            header("Location: ./UserSignUp.php");
        } else if ($usingPage == 'sanpham') {
            include("../pages/ProductDetail/ProductDetail.php");
        } else if ($usingPage == 'login') {
            header("Location: UserLogin.php");
        } else if ($usingPage == 'thongtin') {
            include("../pages/Account/AccountIndex.php");
        } else if ($usingPage == 'timkiem') {
            include("../pages/timkiem.php");
        } else {
            include("../pages/Home/HomeIndex.php");
        }
        ?>

    </div>
</div>