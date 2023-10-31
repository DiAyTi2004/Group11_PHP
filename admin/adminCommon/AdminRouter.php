<div class="container my-4">
    <?php
    if ($workingPage == 'quanlydanhmucsanpham' && $query == 'them') {
        include("./pages/quanlydanhmucsp/them.php");
        include("./pages/quanlydanhmucsp/lietke.php");
    } else if ($workingPage == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("./pages/quanlydanhmucsp/sua.php");
    } else if ($workingPage == 'product' && $query == 'them') {
        include("./pages/Product/ProductIndex.php");
        include("./pages/Product/AddProductPopup.php");
    } else if ($workingPage == 'product' && $query == 'sua') {
        include("./pages/Product/EditProductPopup.php");
    } else if ($workingPage == 'user' && $query == 'them') {
        include("./pages/User/UserIndex.php");
    } else if ($workingPage == 'user' && $query == 'sua') {
        include("./pages/User/EditUserPopup.php");
    } else if ($workingPage == 'order' && $query == 'them') {
        include("./pages/Order/OrderIndex.php");
    } else if ($workingPage == 'order' && $query == 'sua') {
        include("./pages/Order/OrderLogicPopup.php");
    } else if ($workingPage == 'order' && $query == 'xemdonhang') {
        include("./pages/Order/CheckOrderPopUp.php");
    } else if ($workingPage == 'dangxuat') {
        include("Login.php");
    } else {
        include("Dashboard.php");
    }

    ?>

</div>