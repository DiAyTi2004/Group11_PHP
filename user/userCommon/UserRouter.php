<div class="main">
    <div class="maincontent">

        <?php
        if ($usingPage == 'category') {
            include("../pages/Category/CategoryIndex.php");
        } else if ($usingPage == 'cart') {
            include("../pages/Cart/CartIndex.php");
        } else if ($usingPage == 'signup') {
            header("Location: ./UserSignUp.php");
        } else if ($usingPage == 'product') {
            include("../pages/ProductDetail/ProductDetailIndex.php");
        } else if ($usingPage == 'login') {
            header("Location: UserLogin.php");
        } else if ($usingPage == 'thongtin') {
            include("../pages/Account/AccountIndex.php");
        } else if ($usingPage == 'search') {
            include("../pages/Searching/SearchingIndex.php");
        } else if ($usingPage == 'payment') {
            include("../pages/Payment/PaymentIndex.php");
        } else {
            include("../pages/Home/HomeIndex.php");
        }
        ?>

    </div>
</div>