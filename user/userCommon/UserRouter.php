<div class="container flex-grow-1 py-5">
    <?php
    if ($usingPage == 'category') {
        include("../pages/Category/CategoryIndex.php");
    } else if ($usingPage == 'cart') {
        include("../pages/Cart/CartIndex.php");
    } else if ($usingPage == 'product') {
        include("../pages/ProductDetail/ProductDetailIndex.php");
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